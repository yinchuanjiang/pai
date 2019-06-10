<?php

namespace App\Admin\Controllers;

use App\Models\Enum\PhotoEnum;
use App\Models\Category;
use App\Models\Photo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PhotoController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('曝光管理')
            ->description('曝光列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Photo);
        $grid->model()->orderBy('id','desc');
        $grid->id('Id');
        $grid->user()->nickname('昵称');
        $grid->user()->mobile('手机号');
        $grid->category()->cate_name('曝光分类');
        $grid->column('曝光图片')->modal('曝光图片', function ($model) {
            $div = '<div class="images" style="width: 80%;margin: 5px auto">';
            foreach ($model->images as $image){
                $div .= '<img src="'.$image->image_url.'" style="width: 100%">';
            }
            $div .= '</div>';
            return $div;
        });
        $grid->status('状态')->display(function ($status){
            if($status == PhotoEnum::CHECKING) {
                $color = 'label-info';
            }elseif ($status == PhotoEnum::CHECKED_REFUSE){
                $color = 'label-danger';
            }else{
                $color = 'label-success';
            }
            return "<span class='label {$color}'>".PhotoEnum::getStatusName($status)."</span>";
        });
        $grid->is_anonymous('是否匿名')->display(function ($type){
            if($type == PhotoEnum::ANONYMOUS_FALSE) {
                $color = 'label-danger';
                $type = '否';
            }else{
                $color = 'label-success';
                $type = '是';
            }
            return "<span class='label {$color}'>".$type."</span>";
        });
        $grid->content('描述');
        $grid->remark('备注')->editable();
        $grid->created_at('提交时间');
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            //类型
            $categories = Category::all()->pluck('cate_name','id')->all();
            $filter->equal('wp_pai_category_id','曝光类型')->select($categories);
            $status = [
                PhotoEnum::CHECKING => PhotoEnum::getStatusName(PhotoEnum::CHECKING),
                PhotoEnum::CHECKED_PASS => PhotoEnum::getStatusName(PhotoEnum::CHECKED_PASS),
                PhotoEnum::CHECKED_REFUSE => PhotoEnum::getStatusName(PhotoEnum::CHECKED_REFUSE),
            ];
            $filter->equal('status','审核状态')->select($status);
            $filter->where(function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('nickname', 'like', "%{$this->input}%");
                });

            }, '昵称');
            //手机号查询
            $filter->where(function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('mobile', 'like', "%{$this->input}%");
                });

            }, '手机号');
            // 设置created_at字段的范围查询
            $filter->between('created_at', '提交时间')->datetime();
        });
        //禁用批量删除
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
        //关闭行操作 删除
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
            $actions->disableEdit();
            if($actions->row->status == PhotoEnum::CHECKING) {
                $actions->append('<span class="admin-ajax-delete btn btn-sm btn-success" ajax-url="/admin/photos/check/' . $actions->row->id . '/'.PhotoEnum::ANONYMOUS_TRUE.'" style="margin-right:5px">审核通过</span>');
                $actions->append('<span class="admin-ajax-delete btn btn-sm btn-danger" ajax-url="/admin/photos/check/' . $actions->row->id . '/'.PhotoEnum::ANONYMOUS_FALSE.'">不通过</span>');
            }
        });
        //禁用导出数据按钮
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        //设置分页选择器选项
        $grid->perPages([10, 20, 30, 40, 50]);
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Photo::findOrFail($id));

        $show->id('Id');
        $show->wp_pai_user_id('Wp pai user id');
        $show->wp_pai_category_id('Wp pai category id');
        $show->mobile('Mobile');
        $show->status('Status');
        $show->is_anonymous('Is anonymous');
        $show->content('Content');
        $show->remark('Remark');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Photo);

        $form->number('wp_pai_user_id', 'Wp pai user id');
        $form->number('wp_pai_category_id', 'Wp pai category id');
        $form->mobile('mobile', 'Mobile');
        $form->switch('status', 'Status');
        $form->switch('is_anonymous', 'Is anonymous')->default(1);
        $form->textarea('content', 'Content');
        $form->textarea('remark', 'Remark');

        return $form;
    }

    public function check(Photo $photo,$status)
    {
        $photo->status = $status;
        $photo->save();
        return show(200,'操作成功');
    }
}

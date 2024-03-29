@extends("layout.main")
@section("content")
    <h3 class="demos-title">我的曝光</h3>
    <div style="position: relative">
        <div class="weui-navbar">
            <a class="weui-navbar__item @if(request('status',-2) == -2) weui-bar__item--on @endif" href="/user/expose">
                全部
            </a>
            <a class="weui-navbar__item @if(request('status',-2) == \App\Models\Enum\PhotoEnum::CHECKING) weui-bar__item--on @endif" href="/user/expose?status=0">
                待审核
            </a>
            <a class="weui-navbar__item @if(request('status') == \App\Models\Enum\PhotoEnum::CHECKED_REFUSE) weui-bar__item--on @endif" href="/user/expose?status=-1">
                审核失败
            </a>
        </div>
        <div class="weui-tab__bd" style="height: 80%">
            <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
                @if(!$alls->count())
                    <div class="weui-loadmore weui-loadmore_line">
                        <span class="weui-loadmore__tips">暂无数据</span>
                    </div>
                @endif
                <div class="weui-panel weui-panel_access" @if(!$alls->count()) style="display: none" @endif>
                    <div class="weui-panel__bd">
                        @foreach($alls as $all)
                            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__bd">
                                    <div class="avatar">
                                        <img class="weui-media-box__thumb" src="{{$all->user->avatar}}">
                                    </div>
                                    <div class="title_div">
                                        <p>
                                            <span class="title_anonymous">@if($all->is_anonymous == \App\Models\Enum\PhotoEnum::ANONYMOUS_TRUE)
                                                    匿名曝光@else 非匿名曝光 @endif</span> |
                                            <span class="title_status">{{\App\Models\Enum\PhotoEnum::getStatusName($all->status)}}</span>
                                            <span class="title_cate">{{$all->category->cate_name}}</span>
                                        </p>
                                        <p class="title_time">提交时间:{{$all->created_at}}</p>
                                        <p class="title_time">拍摄时间:{{$all->time}}</p>
                                    </div>
                                    <div class="photo-lists">
                                        @foreach($all->images as $image)
                                            <img src="{{$image->image_url}}" alt="" style="margin-top: 5px">
                                        @endforeach
                                    </div>
                                    <p class="tips">{{$all->content}}</p>
                                    <p class="tips" style="color: red">具体位置：{{$all->position}}</p>
                                    @if($all->status == \App\Models\Enum\PhotoEnum::CHECKED_REFUSE)
                                        <p class="remark">备注：{{$refus->remark}}</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                        <div class="pages">
                            {{$alls->links()}}
                        </div>
                        <div class="br" style="position: relative;width: 100%;height: 53px;float: left;border: none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .demos-title {
        background-color: #00cc99;
        margin: 0 auto;
        height: 2rem;
        line-height: 2rem;
        text-align: center;
        color: white;
    }

    .avatar {
        width: 20%;
        float: left;
        border-radius: 100%;
        overflow: hidden;
    }

    .tips {
        color: #9A9A9A;
        font-size: 12px;
        text-align: left;
        float: left;
        font-weight: 400;
        padding-left: 10px;
        width: 100%;
    }

    .avatar img {
        width: 100%;
    }

    .title_div {
        width: 70%;
        float: left;
    }

    .title_div p {
        margin-left: 1rem;
    }

    .demos-title {
        background-color: #00cc99;
        margin: 0 auto;
        height: 2rem;
        line-height: 2rem;
        text-align: center;
        color: white;
    }

    .photo-lists {
        width: 80%;
        margin-top: 10px;
        float: left;
    }

    .photo-lists img {
        width: 100%;
    }

    .title_anonymous {
        font-weight: 700;
        color: #696969;
    }

    .title_status {
        font-size: 10px;
        color: red;
    }

    .title_cate {
        color: #696969;
        font-weight: 400;
    }

    .title_time {
        color: #696969;
        font-size: 10px;
    }

    .remark {
        float: left;
        font-size: 12px;
        font-weight: 400;
        color: red;
        text-align: left;
        padding: .3rem;
    }
</style>
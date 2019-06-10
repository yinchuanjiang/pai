@extends("layout.main")
@section("content")
    <h3 class="demos-title">曝光社区</h3>
    <div class="weui-panel weui-panel_access">
        @if(!$photos->count())
            <div class="weui-loadmore weui-loadmore_line">
                <span class="weui-loadmore__tips">暂无数据</span>
            </div>
        @endif
        <div class="weui-panel__bd">
            @foreach($photos as $photo)
                <div href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__bd">
                        <div class="avatar">
                            <img class="weui-media-box__thumb" src="{{$photo->user->avatar}}">
                        </div>
                        <div class="title_div">
                            <p>
                                <span class="title_anonymous">@if($photo->is_anonymous == \App\Models\Enum\PhotoEnum::ANONYMOUS_TRUE)
                                        匿名曝光@else 非匿名曝光 @endif</span> |
                                <span class="title_status">已审核</span>
                                <span class="title_cate">{{$photo->category->cate_name}}</span>
                            </p>
                            <p class="title_time">曝光时间:{{$photo->created_at}}</p>
                        </div>
                        <div class="photo-lists">
                            @foreach($photo->images as $image)
                                <img src="{{$image->image_url}}" alt="" style="margin-top: 5px">
                            @endforeach
                        </div>
                        <p class="tips">{{$photo->content}}</p>
                    </div>
                </div>
            @endforeach
            <div class="pages">
                {{$photos->links()}}
            </div>
        </div>
        <div class="br" style="position: relative;width: 100%;height: 83px;float: left"></div>
    </div>
    <style>
        .avatar {
            width: 50px;
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
        }

        .avatar img {
            width: 100%;
        }

        .title_div {
            width: 80%;
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
    </style>
    <script src="https://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/axios/0.19.0/axios.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
@endsection
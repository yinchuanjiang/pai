@extends("layout.main")
@section("content")
    <h3 class="demos-title">关于我们</h3>
    <div class="weui-msg">
        <div class="weui-msg__text-area">
            <p class="weui-msg__desc">{{$about}}</p>
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
</style>
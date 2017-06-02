    <!-- 全局js -->
    <script src="{{ URL::asset(__JS__ . 'jquery.min.js?v=2.1.4') }}"></script>
    <script src="{{ URL::asset(__JS__ . 'bootstrap.min.js?v=3.3.6') }}"></script>
    <script src="{{ URL::asset(__JS__ . 'plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ URL::asset(__JS__ . 'plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset(__JS__ . 'plugins/layer/layer.min.js') }}"></script>
    <script src="{{ URL::asset(__JS__ . 'plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset(__JS__ . 'plugins/justTools/just-tips.js') }}"></script>

    <!-- 自定义js -->
    <script src="{{ URL::asset(__ADMIN__ . 'js/admin.js?v=4.1.0') }}"></script>
    <script type="text/javascript" src="{{ URL::asset(__JS__ . 'index.js') }}"></script>

    <!-- 第三方插件 -->
    <script src="{{ URL::asset(__JS__ . 'plugins/pace/pace.min.js') }}"></script>

    @yield('script')
</body>

</html>
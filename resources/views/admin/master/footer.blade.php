<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b style="font-family:Arial;">Version {{ env('VERSION' , app()->version()) }}</b>
    </div>
    <strong>{{ setting('admin.copyright') }}</strong>
</footer>

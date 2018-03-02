@if (Session::has('success'))
    <section id="notification" class="alert alert-success animated slideInDown">
        <p>{{ Session::get('success') }}</p>
    </section>
@endif

@if (Session::has('info'))
    <section id="notification" class="alert alert-info animated slideInDown">
        <p>{{ Session::get('info') }}</p>
    </section>
@endif

@if (Session::has('primary'))
    <section id="notification" class="alert alert-primary animated slideInDown">
        <p>{{ Session::get('primary') }}</p>
    </section>
@endif

@if (Session::has('warning'))
    <section id="notification" class="alert alert-warning animated slideInDown">
        <p>{{ Session::get('warning') }}</p>
    </section>
@endif

@if (Session::has('error'))
    <section id="notification" class="alert alert-danger animated slideInDown">
        <p>{{ Session::get('error') }}</p>
    </section>
@endif

{{-------------------- Errors --------------------}}
@if (count($errors) > 0)
    <section id="notification" class="alert alert-danger animated slideInDown">
    @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
    @endforeach
    </section>
@endif




@extends("crudbooster::admin_template")
@section("content")
    @include("agenda.index")
    <script>
        /*
         * GLOBALS
         */
        URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}';
        /*
         * -->
         */
    </script>
@endsection
@if ($crud->hasAccess('create'))
    <div id="toggle-upload-form-wrapper">
        <a href="#" id="toggle-upload-form" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-upload"></i> Import {{ $crud->entity_name_plural }}</span></a>
        <form id="upload-form" method="POST" action="{{ url($crud->route.'/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input class="btn" type="file" name="{{ strtolower(str_replace(' ' , '', $crud->entity_name)) }}file"/>
            <input class="btn btn-warning" type="submit" value="Upload {{ $crud->entity_name }}"/>
        </form>
        @section('after_scripts')
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $('#upload-form').hide();
                    $('#toggle-upload-form').click(function() {
                        $('#upload-form').slideToggle();
                    });
                });
            </script>
        @stop

        @section('after_styles')
            <style>
                div#toggle-upload-form-wrapper {
                    display: inline-block;
                }

                form#upload-form {
                    margin-top: 4px;
                    width: 145px;
                }
            </style>
        @stop
    </div>
@endif

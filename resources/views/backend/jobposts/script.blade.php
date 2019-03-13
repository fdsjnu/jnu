@section('script')
    <script type="text/javascript">
        $('#code').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#code'),
                theSlug = theTitle.replace(/&/g, '-and-')
                                  .replace(/[^a-z0-9-]+/g, '-')
                                  .replace(/\-\-+/g, '-')
                                  .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });   

         $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            showClear: true
        }); 

         $('#datetimepicker2').datetimepicker({
            format: 'HH:mm:ss',
            showClear: true
        });  
         $('#datetimepicker3').datetimepicker({
            format: 'YYYY-MM-DD',
            showClear: true
        });  
         $('#datetimepicker4').datetimepicker({
            format: 'HH:mm:ss',
            showClear: true
        });    


    </script>
  

@endsection

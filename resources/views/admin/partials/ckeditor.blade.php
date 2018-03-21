<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
<script>
  function loadBootstrap (event) {
    if (event.name == 'mode' && event.editor.mode == 'source')
      return // Skip loading jQuery and Bootstrap when switching to source mode.
    var jQueryScriptTag = document.createElement('script')
    var bootstrapScriptTag = document.createElement('script')
    jQueryScriptTag.src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js'
    bootstrapScriptTag.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'
    var editorHead = event.editor.document.$.head
    editorHead.appendChild(jQueryScriptTag)
    jQueryScriptTag.onload = function () {
      editorHead.appendChild(bootstrapScriptTag)
    }
  }

  CKEDITOR.replace('body', {
    language: '{{app()->getLocale()}}',
    height: 300,
      @if(locale('dir') == 'ltr')
      contentsCss: ['{{ asset('assets/web/css/web-ltr.css') }}'],
      @else
      contentsCss: ['{{ asset('assets/web/css/web-rtl.css') }}'],
      @endif
      on: {
        instanceReady: loadBootstrap,
        mode: loadBootstrap
      }
  })
</script>

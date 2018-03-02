<script src="{{ asset('assets/admin/js/admin.ltr.min.js') }}"></script>
@yield('scripts')
<script>
  $(document).ready(function () {
    $('form.destroy').click(function (e) {
      var msg = $(this).find('input[data-alert]').attr('data-alert')
      if (!confirm(msg)) {
        e.preventDefault()
        return false
      }
      return true
    })
  })

  $('.copy-url').click(function () {
    $(this).removeClass('btn-warning')
    $(this).addClass('btn-success')
    var url = $(this).attr('data-url')
    var $temp = $('<input>')
    $('body').append($temp)
    $temp.val(url).select()
    document.execCommand('copy')
    $temp.remove()
  })
</script>

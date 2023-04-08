@extends('admin.main')
@section('content')
    <iframe src="{{ url('/') }}" frameborder="0" width="100%" height="100%" id="iframes"></iframe>
    <script>
        $("#iframes").on("load", function() {

            function Elements(heading, flighttype, flightkey, flightpage, data) {
                if (flighttype != 'image') {
                    return `<div id="updatingContent">
          <label for="xzcxz" class="form-label" style="text-transform:capitalize;">${heading}</label>
          <textarea id="xzcxz" cols="30" rows="5" class="form-control mb-3" data-flighttype="${flighttype}" data-flightkey="${flightkey}" data-flightpage="${flightpage}">${data}</textarea>
      </div>`;
                } else {
                    return `<div id="updatingContent">
          <img src="${data}"
              alt="" class="rounded mb-3">
          <label for="wertyui" class="form-label">${heading}</label>
          <input type="file" class="form-control form-control-sm mb-3" id="wertyui" data-flighttype="${flighttype}" data-flightkey="${flightkey}" data-flightpage="${flightpage}">
      </div>`;
                }
            }

            // $('#iframes').contents().find("[data-flightEditable=true]").append(
            //     '<svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" height="0.5em" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><circle cx="24" cy="24" r="20" fill="#4a88da" data-original="#4a88da" class=""></circle><path fill="#ffffff" d="m14.5 36.81 3.182-.354a3.006 3.006 0 0 0 1.789-.86l13.65-13.646 2.829-2.829a3 3 0 0 0 0-4.242l-2.829-2.829a3 3 0 0 0-4.242 0l-2.829 2.829L12.4 28.525a3.006 3.006 0 0 0-.86 1.79l-.35 3.185a3 3 0 0 0 2.977 3.332 3.168 3.168 0 0 0 .333-.022zm15.79-23.346a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414l-2.122 2.122-4.243-4.243zM13.178 33.718l.353-3.182a1.01 1.01 0 0 1 .287-.6L26.757 17 31 21.243 18.061 34.182a1.016 1.016 0 0 1-.6.287l-3.182.353a1 1 0 0 1-1.1-1.1z" data-original="#ffffff" class=""></path></g></svg>'
            //     );
            $('#iframes').contents().find("[data-flightEditable=true]").css({'border':'1px solid red','cursor':'pointer'});
            $('#iframes').contents().find("[data-flightEditable=true]").on('click', function() {
                const clicked = $(this);
                $('#mainForm').text('')
                if (clicked.data('flighttype') != 'image') {
                    $('#mainForm').append(Elements(clicked.data('flighttype'), clicked.data('flighttype'),
                        clicked.data('flightkey'), clicked.data('flightpage'), clicked.text()));
                } else {
                    $('#mainForm').append(Elements(clicked.data('flighttype'), clicked.data('flighttype'),
                        clicked.data('flightkey'), clicked.data('flightpage'), clicked.attr('src')));
                }
                return jdskjf(clicked);
            })

            function jdskjf(e) {
                $('#xzcxz').on('change, input', function() {
                    if ($(this).val() == '') {
                        e.css('padding', '5')
                    }
                    e.text($(this).val())
                })
                return updateMyElement();
            }

            function updateMyElement() {
                $('#updateMyElement').on('click', function() {

                    let flighttype = $('#updatingContent #xzcxz').data('flighttype');
                    let flightkey = $('#updatingContent #xzcxz').data('flightkey');
                    let data = $('#updatingContent #xzcxz').val();
                    let update = `{{ url('flight-update') }}/${flighttype}/${flightkey}`;
                    $.ajax({
                        type: 'post',
                        url: update,
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'flighttype': flighttype,
                            'flightkey': flightkey,
                            'data': data
                        },
                        success: function() {
                            alert('form was submitted');
                        }
                    });
                })
            }
        })
    </script>
@endsection

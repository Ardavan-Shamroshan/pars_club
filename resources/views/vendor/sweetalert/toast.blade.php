{{-- change status --}}
<script>
    function changeStatus(id) {
        var element = $('#' + id);
        var url = element.attr('data-url');
        var elementValue = !element.prop('checked');

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                if (response.status)
                    if (response.checked) {
                        element.prop('checked', true);
                        successToast('وضعیت داده با موفقیت فعال شد');
                    } else {
                        element.prop('checked', false);
                        successToast('وضعیت داده با موفقیت غیر فعال شد');
                    }
                else {
                    element.prop('checked', elementValue);
                    errorToast('مشکلی رخ داده است');
                }
            },
            error: function () {
                element.prop('checked', elementValue);
                errorToast('ارتباط برقرار نشد');
            }
        })

        function successToast(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                width: '26em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: message
            })
        }

        function errorToast(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                width: '26em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: message,
            })
        }
    }
</script>

{{-- change posts commentable --}}
<script>
    function commentable(id) {
        var element = $("#" + id + '-commentable')
        var url = element.attr('data-url')
        var elementValue = !element.prop('checked');

        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                if (response.status) {
                    if (response.checked) {
                        element.prop('checked', true);
                        successToast('امکان درج کامنت  با موفقیت فعال شد')
                    } else {
                        element.prop('checked', false);
                        successToast('امکان درج کامنت  با موفقیت غیر فعال شد')
                    }
                } else {
                    element.prop('checked', elementValue);
                    errorToast('هنگام ویرایش مشکلی بوجود امده است')
                }
            },
            error: function () {
                element.prop('checked', elementValue);
                errorToast('ارتباط برقرار نشد')
            }
        });

        function successToast(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                width: '26em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: message
            })
        }

        function errorToast(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                width: '26em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: message,
            })
        }
    }
</script>


{{-- change posts commentable --}}
<script>
    function isbanner(id) {
        var element = $("#" + id + '-banner')
        var url = element.attr('data-url')
        var elementValue = !element.prop('checked');

        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                if (response.status) {
                    if (response.checked) {
                        element.prop('checked', true);
                        successToast('خبر با موفقیت به عنوان بنر ثبت شد')
                    } else {
                        element.prop('checked', false);
                        successToast('خبر با موفقیت از روی بنر غیر فعال شد')
                    }
                } else {
                    element.prop('checked', elementValue);
                    errorToast('هنگام ویرایش مشکلی بوجود امده است')
                }
            },
            error: function () {
                element.prop('checked', elementValue);
                errorToast('ارتباط برقرار نشد')
            }
        });

        function successToast(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                width: '26em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: message
            })
        }

        function errorToast(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
                width: '26em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: message,
            })
        }
    }
</script>
let bioValue = '';
        $(document).on('input', '#bio', function() {
            bioLength = $('#bio').val().length
            if (bioLength > 215) {
                Swal.fire({
                    icon: 'error',
                    title: 'Words Limit Exceeded!',
                    text: 'You cannot type more than 215 words!',
                })
                bioValue = $('#bio').val();
                $('#bio').val(bioValue.substring(0, 216));
            }
        })
        $(document).on('click', '.saveChanges', function() {
            var works_at = $('#works_at').val();
            var study_at = $('#study_at').val();
            var bio = bioValue;
            $.ajax({
                type: "POST",
                // url: "{{ route('admin.myWall.changeProfileDetails') }}",
                url: '/admin/myWall/change/profileDetails',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    worksAt: works_at,
                    studyAt: study_at,
                    bio: bio
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: data,
                    })
                    $('.swal2-confirm').on('click', function() {
                        location.reload();
                    })
                }
            });
        })

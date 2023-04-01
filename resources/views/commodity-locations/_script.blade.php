@push('css')
    <link rel="stylesheet" href="{{ asset('modules/select2/dist/css/select2.min.css') }}">
@endpush

<script src="{{ asset('modules/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#idkaryawan_create').select2();

        $(".show_modal").click(function() {
            let id = $(this).data("id")
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "GET",
                url: "commodity-locations/json/" + id,
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#modalLabel").html(data.data.nmgedung)
                    $("#nmgedung").html(data.data.nmgedung)
                    $("#name").html(data.data.name)
                    $("#kdr").html(data.data.kdr)
                    $("#idkaryawan").html(data.data.idkaryawan)
                    $("#description").html(data.data.description)
                }
            })
        })

        $(".swal-edit-button").click(function() {
            let id = $(this).data("id");
            let token = $("input[name=_token]").val();

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "commodity-locations/json/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#nmgedung_edit").val(data.data.nmgedung)
                    $("#name_edit").val(data.data.name)
                    $("#kdr_edit").val(data.data.kdr)
                    $("#idkaryawan_edit").val(data.data.idkaryawan)
                    $("#description_edit").val(data.data.description)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.",
                        "warning");
                }
            });

            $("#swal-update-button").click(function(e) {
                e.preventDefault();
                // Get id injected by .swal-edit-button
                let id = $("#swal-update-button").attr("data-id");
                let token = $("input[name=_token]").val();

                $.ajax({
                    url: "commodity-locations/json/" + id,
                    type: "PUT",
                    data: {
                        _token: token,
                        nmgedung: $("#nmgedung_edit").val(),
                        name: $("#name_edit").val(),
                        kdr: $("#kdr_edit").val(),
                        idkaryawan: $("#idkaryawan_edit").val(),
                        description: $("#description_edit").val()
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Berhasil",
                            text: "Data berhasil diubah.",
                            icon: "success",
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading();
                                timerInterval = setInterval(() => {
                                    const content = Swal
                                        .getContent();
                                    if (content) {
                                        const b = content
                                            .querySelector("b");
                                        if (b) {
                                            b.textContent = Swal
                                                .getTimerLeft();
                                        }
                                    }
                                }, 100);
                            },
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 800)
                    },
                    error: function(data) {
                        Swal.fire("Gagal!", "Tidak dapat mengubah data.",
                        "warning");
                    }
                });
            });
        });

        $("form[name='commodity_location_create']").submit(function(e) {
            e.preventDefault();
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "commodity-locations/json",
                data: {
                    _token: token,
                    nmgedung: $("#nmgedung_create").val(),
                    name: $("#name_create").val(),
                    kdr: $("#kdr_create").val(),
                    idkaryawan: $("#idkaryawan_create").val(),
                    description: $("#description_create").val()
                },
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector(
                                    "b");
                                    if (b) {
                                        b.textContent = Swal
                                            .getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 500)
                },
                error: function(data) {
                    console.log('gagal');
                    console.log(data);
                }
            })
        })

        $(".swal-delete-button").click(function() {
            Swal.fire({
                title: "Hapus?",
                text: "Data tidak akan bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.value) {
                    let id = $(this).data("id");
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "commodity-locations/json/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus.",
                                icon: "success",
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                    timerInterval = setInterval(() => {
                                        const content = Swal
                                            .getContent();
                                        if (content) {
                                            const b = content
                                                .querySelector(
                                                    "b");
                                            if (b) {
                                                b.textContent =
                                                    Swal
                                                    .getTimerLeft();
                                            }
                                        }
                                    }, 100);
                                },
                                showConfirmButton: false
                            });

                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        },
                        error: function(data) {
                            Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
                        }
                    });
                }
            });
        });
    })
</script>

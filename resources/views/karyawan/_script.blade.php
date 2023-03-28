<script>
    $(document).ready(function() {
        $(".show_modal").click(function() {
            let id = $(this).data("id")
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "GET",
                url: "karyawan/json/" + id,
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#nm_karyawan").html(data.data.nm_karyawan)
                    $("#tempat_tinggal").html(data.data.tempat_tinggal)
                    $("#tanggal_lahir").html(data.data.tanggal_lahir)
                    $("#bidang_studi").html(data.data.bidang_studi)
                    $("#status_kepegawaian").html(data.data.status_kepegawaian)
                    $("#id_jabatan").html(data.data.id_jabatan)
                    $("#id_unit").html(data.data.id_unit)
                    $("#id_kelas").html(data.data.id_kelas)
                    $("#pendidikan_terakhir").html(data.data.pendidikan_terakhir)
                    $("#no_hp").html(data.data.no_hp)
                    $("#tgl_masuk_alfityan").html(data.data.tgl_masuk_alfityan)
                    $("#foto_karyawan").html(data.data.foto_karyawan)
                    $("#pelatihan").html(data.data.pelatihan)
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
                    $("#name_edit").val(data.data.name)
                    $("#description_edit").val(data.data.description)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
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
                        name: $("#name_edit").val(),
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
                                    const content = Swal.getContent();
                                    if (content) {
                                        const b = content.querySelector("b");
                                        if (b) {
                                            b.textContent = Swal.getTimerLeft();
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
                        Swal.fire("Gagal!", "Tidak dapat mengubah data.", "warning");
                    }
                });
            });
        });

        $("form[name='karyawan_create']").submit(function(e) {
            e.preventDefault();
            let token = $("input[name=_token]").val();
            $.ajax({
                type: "POST",
                url: "karyawan/json",
                data: {
                    _token: token,
                    nm_karyawan: $("#nm_karyawan_create").val(),
                    tempat_tinggal: $("#tempat_tinggal_create").val(),
                    tanggal_lahir: $("#tanggal_lahir_create").val(),
                    bidang_studi: $("#bidang_studi_create").val(),
                    status_kepegawaian: $("#status_kepegawaian_create").val(),
                    id_jabatan: $("#id_jabatan_create").val(),
                    id_unit: $("#id_unit_create").val(),
                    id_kelas: $("#id_kelas_create").val(),
                    pendidikan_terakhir: $("#pendidikan_terakhir_create").val(),
                    no_hp: $("#no_hp_create").val(),
                    tgl_masuk_alfityan: $("#tgl_masuk_alfityan_create").val(),
                    foto_karyawan: $("#foto_karyawan_create").val(),
                    pelatihan: $("#pelatihan_create").val()
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
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
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
                                        const content = Swal.getContent();
                                        if (content) {
                                            const b = content.querySelector("b");
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft();
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
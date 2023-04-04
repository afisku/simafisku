<script>
    $(document).ready(function() {
        $(".show_modal").click(function() {
            let id = $(this).data("id")
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "GET",
                url: "karyawanfityan/json/" + id,
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
                url: "karyawanfityan/json/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#nm_karyawan_edit").val(data.data.nm_karyawan)
                    $("#tempat_tinggal_edit").val(data.data.tempat_tinggal)
                    $("#tanggal_lahir_edit").val(data.data.tanggal_lahir)
                    $("#bidang_studi_edit").val(data.data.bidang_studi)
                    $("#status_kepegawaian_edit").val(data.data.status_kepegawaian)
                    $("#id_jabatan_edit").val(data.data.id_jabatan)
                    $("#id_unit_edit").val(data.data.id_unit)
                    $("#id_kelas_edit").val(data.data.id_kelas)
                    $("#pendidikan_terakhir_edit").val(data.data.pendidikan_terakhir)
                    $("#no_hp_edit").val(data.data.no_hp)
                    $("#tgl_masuk_alfityan_edit").val(data.data.tgl_masuk_alfityan)
                    $("#foto_karyawan_edit").val(data.data.foto_karyawan)
                    $("#pelatihan_edit").val(data.data.pelatihan)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat informasi.", "warning");
                }
            });

            $("#swal-update-button").click(function(e) {
                e.preventDefault();
                // Get id injected by .swal-edit-button
                let id = $("#swal-update-button").attr("data-id");
                let token = $("input[name=_token]").val();

                $.ajax({
                    url: "karyawanfityan/json/" + id,
                    type: "PUT",
                    data: {
                        _token: token,
                        nm_karyawan: $("#nm_karyawan_edit").val(),
                        tempat_tinggal: $("#tempat_tinggal_edit").val(),
                        tanggal_lahir: $("#tanggal_lahir_edit").val(),
                        bidang_studi: $("#bidang_studi_edit").val(),
                        status_kepegawaian: $("#status_kepegawaian_edit").val(),
                        id_jabatan: $("#id_jabatan_edit").val(),
                        id_unit: $("#id_unit_edit").val(),
                        id_kelas: $("#id_kelas_edit").val(),
                        pendidikan_terakhir: $("#pendidikan_terakhir_edit").val(),
                        no_hp: $("#no_hp_edit").val(),
                        tgl_masuk_alfityan: $("#tgl_masuk_alfityan_edit").val(),
                        pelatihan: $("#pelatihan_edit").val(),
                        foto_karyawan: $("#foto_karyawan_edit").val()
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
                url: "karyawanfityan/json",
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
                        url: "karyawanfityan/json/" + id,
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
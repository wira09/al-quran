function searchSurah() {
  $("#surah-list").html("");

  $.ajax({
    url: "https://al-quran-8d642.firebaseio.com/data.json?print=pretty",
    type: "get",
    dataType: "json",
    success: function (result) {
      let query = $("#search-input").val().toLowerCase();

      if (Array.isArray(result)) {
        let filteredSurahs = result.filter(
          (surah) => surah.nama && surah.nama.toLowerCase().includes(query)
        );

        if (filteredSurahs.length > 0) {
          filteredSurahs.forEach((surah) => {
            $("#surah-list").append(`
              <div class="col-md-4 mb-3">
                <div class="card surah-item" data-surah-id="${surah.nomor}">
                  <div class="card-body">
                    <h5 class="card-title">${surah.nama}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${surah.asma}</h6>
                    <p class="card-text">Jumlah ayat: ${surah.ayat}</p>
                  </div>
                </div>
              </div>
            `);
          });

          // Tambahkan event listener untuk setiap surah-item
          $(".surah-item").on("click", function () {
            let surahId = $(this).data("surah-id");
            let surahName = $(this).find(".card-title").text();
            loadAyat(surahId, surahName);
          });
        } else {
          $("#surah-list").html(
            '<div class="col-12"><p class="text-center">Surah tidak ditemukan.</p></div>'
          );
        }
      } else {
        $("#surah-list").html(
          '<div class="col-12"><p class="text-center">Data tidak valid.</p></div>'
        );
      }

      $("#search-input").val("");
    },
  });
}

function loadAyat(surahId, surahName) {
  $.getJSON(
    `https://api.npoint.io/99c279bb173a6e28359c/surat/${surahId}`,
    function (ayatData) {
      $("#ayat-list").empty();
      $("#surah-title").text(surahName);

      // Tambahkan container untuk ayat-ayat
      let ayatContainer = $('<div id="ayat-container"></div>');

      ayatData.forEach((ayat) => {
        ayatContainer.append(`
          <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-start">
              <span class="badge bg-primary rounded-pill">${ayat.nomor}</span>
              <div class="ms-2 me-auto">
                <div class="fw-bold arabic-text">${ayat.ar}</div>
                ${ayat.id}
              </div>
            </div>
          </li>
        `);
      });

      // Kosongkan dan tambahkan container ke dalam ayat-list
      $("#ayat-list").empty().append(ayatContainer);

      $("#surah-page").hide();
      $("#ayat-page").show();

      // // Reset scroll posisi ayat-container
      $("#ayat-container").scrollTop(0);

      // // Scroll ke atas halaman dengan animasi
      $("html, body").animate({ scrollTop: 0 }, 300);
    }
  );
}

$("#search-button").on("click", function () {
  searchSurah();
});

$("#search-input").on("keyup", function (e) {
  if (e.keyCode === 13) {
    searchSurah();
  }
});

$("#back-button, #home-link").on("click", function () {
  $("#ayat-page").hide();
  $("#surah-page").show();
});

// Load semua surah saat halaman dimuat
$(document).ready(function () {
  searchSurah();
});

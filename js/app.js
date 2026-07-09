/*
    Gestion du comportement du form.filterContainer
    Source : https://developer.mozilla.org/fr/docs/Web/API/Event/preventDefault
*/
(function () {
    var filterContainer = document.querySelector('.filterContainer');
    if (filterContainer) {
        filterContainer.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });
    }

    var resultsContainer = document.querySelector('.resultsContainer');
    if (!resultsContainer) return;

    var tiles = Array.from(resultsContainer.querySelectorAll('.tileResult'));

    tiles.forEach(function (tile, i) {
        tile.dataset.index = i;
    });

    var rameTri = 0;
    var livraisonTri = 0;

    var rameBtn = document.getElementById('filterRame');
    var rameUp = document.getElementById('rameUp');
    var rameDown = document.getElementById('rameDown');

    var livraisonBtn = document.getElementById('filterLivraison');
    var livraisonUp = document.getElementById('livraisonUp');
    var livraisonDown = document.getElementById('livraisonDown');

    if (rameBtn) {
        rameBtn.addEventListener('click', function () {
            rameTri = (rameTri + 1) % 3;
            livraisonTri = 0;
            updateChevrons();
            applySort();
        });
    }

    if (livraisonBtn) {
        livraisonBtn.addEventListener('click', function () {
            livraisonTri = (livraisonTri + 1) % 3;
            rameTri = 0;
            updateChevrons();
            applySort();
        });
    }

    function updateChevrons() {
        if (rameUp) rameUp.classList.toggle('visible', rameTri === 1);
        if (rameDown) rameDown.classList.toggle('visible', rameTri === 2);
        if (livraisonUp) livraisonUp.classList.toggle('visible', livraisonTri === 1);
        if (livraisonDown) livraisonDown.classList.toggle('visible', livraisonTri === 2);
    }

    function applySort() {
        var sorted = tiles.slice();

        if (rameTri > 0) {
            sorted.sort(function (a, b) {
                var numA = parseInt(a.dataset.rame.replace(/\D/g, ''), 10);
                var numB = parseInt(b.dataset.rame.replace(/\D/g, ''), 10);
                return rameTri === 1 ? numA - numB : numB - numA;
            });
        } else if (livraisonTri > 0) {
            sorted.sort(function (a, b) {
                var dateA = parseDate(a.dataset.livraison);
                var dateB = parseDate(b.dataset.livraison);
                return livraisonTri === 1 ? dateA - dateB : dateB - dateA;
            });
        } else {
            sorted.sort(function (a, b) {
                return +a.dataset.index - +b.dataset.index;
            });
        }

        sorted.forEach(function (tile) {
            resultsContainer.appendChild(tile);
        });
    }

    function parseDate(str) {
        var parts = str.split('/').map(Number);
        return new Date(parts[2], parts[1] - 1, parts[0]).getTime();
    }

    /*
        Ajout d'un select avec le contenu de la variable livrees dans filterContainer.
        livrees = ["IDFM", "Carmillon", ...]
    */
    if (typeof livrees !== 'undefined' && filterContainer) {
        var selectLivrees = document.createElement('select');
        selectLivrees.id = 'filterLivrees';
        selectLivrees.classList.add('filterSelect');
        selectLivrees.innerHTML = '<option value="" selected>Tous</option>' +
            livrees.map(function (livree) {
                return '<option value="' + livree + '">' + livree + '</option>';
            }).join('');
        filterContainer.appendChild(selectLivrees);
        selectLivrees.addEventListener('change', function (e) {
            var selectedValue = e.target.value;
            tiles.forEach(function (tile) {
                if (selectedValue === '' || tile.dataset.livery === selectedValue) {
                    tile.classList.remove('fullHide');
                    setTimeout(function () {
                        tile.classList.remove('hidden');
                    }, 500);
                } else {
                    tile.classList.add('hidden');
                    setTimeout(function () {
                        tile.classList.add('fullHide');
                    }, 500);
                }
            });
        });
    }

    /*
    * Remplissage du champ de recherche avec le parametre 'search' de l'URL.
    */
    var urlParams = new URLSearchParams(window.location.search);
    var search = urlParams.get('search');
    var homeBar = document.getElementById('homeBar');
    if (search && homeBar) {
        homeBar.value = search;
    }

    /*
    * Au clic sur une tuile de la liste des trains, on redirige vers detailsTrain.php?id=[id du train].
    */
    tiles.forEach(function (tile) {
        tile.addEventListener('click', function () {
            var idTrain = tile.dataset.train;
            window.location.href = 'detailsTrain.php?id=' + idTrain;
        });
    });
})();

/*
* Au clic sur l'overlay, on retire le focus des inputs du form.filterContainer.
*/
(function () {
    var overlay = document.getElementById('overlay');
    if (!overlay) return;
    overlay.addEventListener('click', function () {
        var inputs = document.querySelectorAll('.filterContainer input');
        inputs.forEach(function (input) {
            input.blur();
        });
    });
})();

/*
* Au clic sur une tuile (page d'accueil), on redirige vers detailsTrain.php?id=[id du train].
* Exclut les .tileResult deja geres par le bloc resultsContainer.
*/
(function () {
    var tiles = document.querySelectorAll('.tile[role="button"]:not(.tileResult)');
    tiles.forEach(function (tile) {
        tile.addEventListener('click', function () {
            var idTrain = tile.dataset.train;
            window.location.href = 'detailsTrain.php?id=' + idTrain;
        });
    });
})();

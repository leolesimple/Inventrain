/*
    Gestion du comportement du form.filterContainer
    Source : https://developer.mozilla.org/fr/docs/Web/API/Event/preventDefault
*/
const filterContainer = document.querySelector('.filterContainer');
filterContainer.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
});

/*
    Gestion du tri des .tileResult par data-rame (ex: "360L" → 360) et date de livraison (ex: "01/01/2023")
    Au clic sur le bouton, bascule entre : pas de tri (ordre d’origine), tri croissant, tri décroissant.
    Les chevrons s’affichent via une classe CSS selon l’état, et on garde l’ordre de base avec data-index au chargement.
*/
const resultsContainer = document.querySelector('.resultsContainer')
const tiles = Array.from(resultsContainer.querySelectorAll('.tileResult'))

tiles.forEach((tile, i) => {
    tile.dataset.index = i
})

let rameTri = 0
let livraisonTri = 0

const rameBtn = document.getElementById('filterRame')
const rameUp = document.getElementById('rameUp')
const rameDown = document.getElementById('rameDown')

const livraisonBtn = document.getElementById('filterLivraison')
const livraisonUp = document.getElementById('livraisonUp')
const livraisonDown = document.getElementById('livraisonDown')

rameBtn.addEventListener('click', () => {
    rameTri = (rameTri + 1) % 3
    livraisonTri = 0
    updateChevrons()
    applySort()
})

livraisonBtn.addEventListener('click', () => {
    livraisonTri = (livraisonTri + 1) % 3
    rameTri = 0
    updateChevrons()
    applySort()
})

function updateChevrons() {
    rameUp.classList.toggle('visible', rameTri === 1)
    rameDown.classList.toggle('visible', rameTri === 2)
    livraisonUp.classList.toggle('visible', livraisonTri === 1)
    livraisonDown.classList.toggle('visible', livraisonTri === 2)
}

function applySort() {
    const sorted = tiles.slice();

    if (rameTri > 0) {
        sorted.sort((a, b) => {
            const numA = parseInt(a.dataset.rame.replace(/\D/g, ''), 10)
            const numB = parseInt(b.dataset.rame.replace(/\D/g, ''), 10)
            return rameTri === 1 ? numA - numB : numB - numA
        })
    } else if (livraisonTri > 0) {
        sorted.sort((a, b) => {
            const dateA = parseDate(a.dataset.livraison)
            const dateB = parseDate(b.dataset.livraison)
            return livraisonTri === 1 ? dateA - dateB : dateB - dateA
        })
    } else {
        sorted.sort((a, b) => +a.dataset.index - +b.dataset.index)
    }

    sorted.forEach(tile => resultsContainer.appendChild(tile))
}

function parseDate(str) {
    const [d, m, y] = str.split('/').map(Number)
    return new Date(y, m - 1, d).getTime()
}

/*
    Ajout d'un select avec le contenu de la variable livrees dans filterContainer.
    livrees = ["IDFM", "Carmillon", ...]
*/
const selectLivrees = document.createElement('select')
selectLivrees.id = 'filterLivrees'
selectLivrees.classList.add('filterSelect')
selectLivrees.innerHTML = `
    <option value="" selected>Tous</option>
    ${livrees.map(livree => `<option value="${livree}">${livree}</option>`).join('')}
`
filterContainer.appendChild(selectLivrees)
selectLivrees.addEventListener('change', (e) => {
    const selectedValue = e.target.value
    tiles.forEach(tile => {
        if (selectedValue === '' || tile.dataset.livery === selectedValue) {
            tile.classList.remove('fullHide');
            setTimeout(() => {
                tile.classList.remove('hidden');
            }, 500);
        } else {
            tile.classList.add('hidden');
            // After.5sec, add class 'fullHide' to tile
            setTimeout(() => {
                tile.classList.add('fullHide');
            }, 500);
        }
    })
})
/*
* Écoute les modifications du formulaire pour prévenir l'utilisateur s'il tente de quitter la page sans avoir sauvegardé ses modifications.
*/
let formModified = false

document.querySelectorAll('input, textarea, select').forEach(el => {
    el.addEventListener('input', () => {
        formModified = true
    })
})

history.pushState(null, null, location.href)

window.addEventListener('popstate', () => {
    if (formModified) {
        alert("Attention, vous allez perdre les données non sauvegardées du formulaire.")
        history.pushState(null, null, location.href)
    }
})

/*
* Tri des options des selects du formulaire.
* Les options sont triées par ordre alphabétique, en gardant les options vides ou "Choisir..." en premier.
*/
document.querySelectorAll('select:not(#serie)').forEach(select => {
    const options = Array.from(select.options)
    const fixedOptions = options.filter(option => option.value === '' || option.text.trim().toLowerCase() === 'choisir...')
    const sortableOptions = options.filter(option => !fixedOptions.includes(option))

    sortableOptions.sort((a, b) => a.text.localeCompare(b.text))

    select.innerHTML = ''
    fixedOptions.forEach(option => select.appendChild(option))
    sortableOptions.forEach(option => select.appendChild(option))
})

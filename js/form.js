// Listen the use of back button
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

// Code qui trie les <options> de chaque select dans l'ordre alphabétique (sauf les options vides) et le select #serie
document.querySelectorAll('select:not(#serie)').forEach(select => {
    const options = Array.from(select.options)
    const fixedOptions = options.filter(option => option.value === '' || option.text.trim().toLowerCase() === 'choisir...')
    const sortableOptions = options.filter(option => !fixedOptions.includes(option))

    sortableOptions.sort((a, b) => a.text.localeCompare(b.text))

    select.innerHTML = ''
    fixedOptions.forEach(option => select.appendChild(option))
    sortableOptions.forEach(option => select.appendChild(option))
})

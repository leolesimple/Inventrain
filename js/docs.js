// add next to #headContent , this :
//     <aside class="tocContainer">
//         <details class="toc">
//             <summary>Table des matières</summary>
//         </details>
//     </aside>

const headContent = document.querySelector('#headContent');
const tocContainer = '    <aside class="tocContainer">\n' +
    '        <details class="toc">\n' +
    '            <summary>Table des matières</summary>\n' +
    '        </details>\n' +
    '    </aside>';
headContent.insertAdjacentHTML('beforeend', tocContainer);

const titles = document.querySelectorAll('h2, h3, h4, h5, h6');
const toc = document.querySelector('.toc');
titles.forEach(title => {
    const li = document.createElement('li');
    const a = document.createElement('a');
    a.href = '#' + title.innerText.replace(/ /g, '-').toLowerCase();
    a.innerText = title.innerText;
    li.appendChild(a);
    toc.appendChild(li);
    title.id = title.innerText.replace(/ /g, '-').toLowerCase();
    if (title.tagName === 'H1') {
        li.style.marginLeft = '0';
    } else if (title.tagName === 'H2') {
        li.style.marginLeft = '1em';
    } else if (title.tagName === 'H3') {
        li.style.marginLeft = '2em';
    } else if (title.tagName === 'H4') {
        li.style.marginLeft = '3em';
    } else if (title.tagName === 'H5') {
        li.style.marginLeft = '4em';
    } else if (title.tagName === 'H6') {
        li.style.marginLeft = '5em';
    }
});


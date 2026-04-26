export function renderColorPreview(){

const tables = document.querySelectorAll(".md-table")

tables.forEach(table=>{

const rows = table.querySelectorAll("tbody tr")

const palette = document.createElement("div")
palette.className = "color-palette"

let found=false

rows.forEach(row=>{

const cells=row.querySelectorAll("td")

if(cells.length<2) return

const token=cells[0].textContent.trim()
const hex=cells[1].textContent.trim()

if(/^#([0-9A-F]{3}){1,2}$/i.test(hex)){

found=true

const card=document.createElement("div")
card.className="color-card"

card.innerHTML=`

<div class="color-preview" style="background:${hex}"></div>

<div class="color-meta">

<div class="color-token">${token}</div>
<div class="color-hex">${hex}</div>

</div>

`

palette.appendChild(card)

}

})

if(found){
table.after(palette)
}

})

}
export function renderTokenBlocks(){

const rows=document.querySelectorAll(".md-table tr")

rows.forEach(row=>{

const cells=row.querySelectorAll("td")

if(cells.length<2) return

const hex=cells[1].textContent.trim()

if(/^#([0-9A-F]{3}){1,2}$/i.test(hex)){

const block=document.createElement("div")

block.className="token-block"

block.innerHTML=`

<div class="token-preview" style="background:${hex}"></div>

<div class="token-info">

<div>${cells[0].textContent}</div>
<div>${hex}</div>

</div>

`

row.after(block)

}

})

}
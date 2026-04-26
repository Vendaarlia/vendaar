export function renderColorTokens(){

const cells = document.querySelectorAll(".md-table td")

cells.forEach(cell=>{

const value = cell.textContent.trim()

if(/^#([0-9A-F]{3}){1,2}$/i.test(value)){

const wrapper = document.createElement("div")

wrapper.className = "token-color"

const swatch = document.createElement("span")

swatch.className = "token-swatch"
swatch.style.background = value

const code = document.createElement("code")

code.textContent = value

wrapper.appendChild(swatch)
wrapper.appendChild(code)

cell.innerHTML = ""
cell.appendChild(wrapper)

}

})

}
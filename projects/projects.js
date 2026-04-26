import {parseFrontmatter} from "/projects/projects-js/frontmatter.js"

async function loadProjects(){

const manifest = await fetch("/projects/contents/manifest.json")

const files = await manifest.json()

const container = document.querySelector("#projects")

for(const file of files){

const res = await fetch(file)

const text = await res.text()

const {data} = parseFrontmatter(text)

const cover = (data.cover || '').replace(/^["']|["']$/g, '')
const title = (data.title || 'Untitled')
const client = (data.client || '')
const year = (data.year || '')

const card = document.createElement("a")
card.href = `/project.html?slug=${data.slug}`
card.className = "project-card"
card.innerHTML = `
  <img src="${cover}" alt="${title}">
  <h3>${title}</h3>
  <p>${client} · ${year}</p>
`

container.appendChild(card)

}

}

let allLabs = []
let currentPage = 1
const LABS_PER_PAGE = 6

async function loadLabs() {
  const res = await fetch("/projects/contents/labs-manifest.json")
  allLabs = await res.json()
  
  const container = document.querySelector("#labs")
  if (!container) return
  
  // Create wrapper for labs grid
  const labsGrid = document.createElement("div")
  labsGrid.className = "labs-grid"
  container.appendChild(labsGrid)
  
  // Create pagination controls
  const pagination = document.createElement("div")
  pagination.className = "labs-pagination"
  pagination.innerHTML = `
    <button class="btn prev" disabled>← Prev</button>
    <span class="page-info">Page 1 of 1</span>
    <button class="btn next" disabled>Next →</button>
  `
  container.appendChild(pagination)
  
  // Add event listeners
  pagination.querySelector(".prev").addEventListener("click", () => {
    if (currentPage > 1) {
      currentPage--
      renderLabsPage()
    }
  })
  
  pagination.querySelector(".next").addEventListener("click", () => {
    const totalPages = Math.ceil(allLabs.length / LABS_PER_PAGE)
    if (currentPage < totalPages) {
      currentPage++
      renderLabsPage()
    }
  })
  
  renderLabsPage()
}

function renderLabsPage() {
  const labsGrid = document.querySelector(".labs-grid")
  const pagination = document.querySelector(".labs-pagination")
  if (!labsGrid || !pagination) return
  
  // Clear current labs
  labsGrid.innerHTML = ""
  
  // Calculate slice
  const start = (currentPage - 1) * LABS_PER_PAGE
  const end = start + LABS_PER_PAGE
  const pageLabs = allLabs.slice(start, end)
  
  // Render labs for this page
  for (const lab of pageLabs) {
    const card = document.createElement("a")
    card.href = lab.link
    card.className = "lab-card"
    card.target = "_blank"
    card.rel = "noopener noreferrer"
    card.innerHTML = `
      <img src="${lab.image}" alt="${lab.title}">
      <h3>${lab.title}</h3>
    `
    labsGrid.appendChild(card)
  }
  
  // Update pagination info and buttons
  const totalPages = Math.ceil(allLabs.length / LABS_PER_PAGE)
  const pageInfo = pagination.querySelector(".page-info")
  const prevBtn = pagination.querySelector(".prev")
  const nextBtn = pagination.querySelector(".next")
  
  pageInfo.textContent = `Page ${currentPage} of ${totalPages}`
  prevBtn.disabled = currentPage === 1
  nextBtn.disabled = currentPage === totalPages || totalPages === 0
}

loadProjects()
loadLabs()
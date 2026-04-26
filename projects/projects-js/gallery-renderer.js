export function renderGallery(){

  const images = document.querySelectorAll("#project-body img")

  if(images.length === 0) return

  const gallery = document.createElement("div")
  gallery.className = "image-gallery"

  images.forEach(img => {
    const item = document.createElement("div")
    item.className = "gallery-item"
    item.appendChild(img.cloneNode())
    gallery.appendChild(item)
    img.remove()
  })

  // Taruh setelah .project-header, bukan di akhir #project-body
  const projectHeader = document.querySelector(".project-header")
  projectHeader.insertAdjacentElement("afterend", gallery)

}
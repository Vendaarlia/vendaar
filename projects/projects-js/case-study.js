export function renderCaseStudy() {

  const container = document.querySelector("#project-body")
  if (!container) return

  const headings = container.querySelectorAll("h1")

  headings.forEach(h1 => {

    const title = h1.textContent.toLowerCase().trim()

    const isTarget =
      title === "problem" ||
      title === "strategy" ||
      title === "design" ||
      title === "results"

    if (!isTarget) return

    const wrapper = document.createElement("section")
    wrapper.classList.add("case-study")

    h1.parentNode.insertBefore(wrapper, h1)
    wrapper.appendChild(h1)

    let next = wrapper.nextSibling

    while (next) {
      if (next.nodeType === 1 && next.tagName === "H1") break

      const temp = next.nextSibling
      wrapper.appendChild(next)
      next = temp
    }

  })

}
export function parseTables(md) {

  function cleanCell(text) {
    return text.replace(/`/g, "").trim()
  }

  const tableRegex = /\|(.+)\|\n\|([-| ]+)\|\n((\|.*\|\n?)*)/g

  return md.replace(tableRegex, (match, header, divider, rows) => {

    const headers = header.split("|").map(h => cleanCell(h))

    const bodyRows = rows.trim().split("\n")

    let table = `
<table class="md-table">
<thead>
<tr>
${headers.map(h => `<th>${h}</th>`).join("")}
</tr>
</thead>
<tbody>
`

    bodyRows.forEach(row => {
      const cells = row.split("|").slice(1, -1).map(c => cleanCell(c))

      table += `
<tr>
${cells.map((c, i) => `<td data-label="${headers[i] ?? ''}">${c}</td>`).join("")}
</tr>
`
    })

    table += `
</tbody>
</table>
`
    return table
  })
}
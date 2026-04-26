export function renderMarkdown(md){

let html = md

  // Code blocks (process first - preserve content)
  const codeBlocks = []
  html = html.replace(/```(\w+)?\n([\s\S]*?)```/gim, (match, lang, code) => {
    const escaped = code
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
    const placeholder = `<!--CODE_BLOCK_${codeBlocks.length}-->`
    codeBlocks.push(`<pre><code class="language-${lang || 'plaintext'}">${escaped}</code></pre>`)
    return placeholder
  })

  // Images
  html = html.replace(/!\[(.*?)\]\((.*?)\)/gim, '<img src="$2" alt="$1"/>')

  // Horizontal rules
  html = html.replace(/^---$/gim, '<div class="section-spacer"></div>')

  // Headings (process BEFORE inline formatting)
  html = html.replace(/^### (.*$)/gim, '<h3>$1</h3>')
  html = html.replace(/^## (.*$)/gim, '<h2>$1</h2>')
  html = html.replace(/^# (.*$)/gim, '<h1>$1</h1>')

  // Blockquotes
  html = html.replace(/^> (.*$)/gim, '<blockquote>$1</blockquote>')

  // Lists
  html = html.replace(/(?:^|\n)(?:\*|\-|\+)\s+(.*)/gim, '<li>$1</li>')
  html = html.replace(/(<li>.*?<\/li>\s*)+/g, '<ul>$&</ul>')

  // Inline formatting - bold (process after headings)
  html = html.replace(/\*\*(.*?)\*\*/gim, '<strong>$1</strong>')
  // Italic: single asterisks that are NOT part of double asterisks
  html = html.replace(/(^|[^*])\*([^*].*?)\*([^*]|$)/gim, '$1<em>$2</em>$3')

  // Simple paragraph handling: wrap text between block elements
  // First, normalize multiple newlines
  html = html.replace(/\n{2,}/g, '\n\n')
  
  // Split into blocks
  const lines = html.split('\n')
  let result = []
  let currentPara = []
  
  for (const line of lines) {
    const trimmed = line.trim()
    
    // Check if it's a block element (heading, list, etc.)
    if (trimmed.startsWith('<h') || 
        trimmed.startsWith('<ul') || 
        trimmed.startsWith('<ol') || 
        trimmed.startsWith('<blockquote') ||
        trimmed.startsWith('<pre') ||
        trimmed.startsWith('<div') ||
        trimmed.startsWith('<img') ||
        trimmed.startsWith('<!--CODE_BLOCK')) {
      
      // Flush current paragraph if any
      if (currentPara.length > 0) {
        result.push('<p>' + currentPara.join(' ') + '</p>')
        currentPara = []
      }
      result.push(trimmed)
    } else if (trimmed) {
      // It's text content, add to current paragraph
      currentPara.push(trimmed)
    }
  }
  
  // Flush remaining paragraph
  if (currentPara.length > 0) {
    result.push('<p>' + currentPara.join(' ') + '</p>')
  }
  
  html = result.join('\n')

  // Restore code blocks
  codeBlocks.forEach((block, i) => {
    html = html.replace(`<!--CODE_BLOCK_${i}-->`, block)
  })

return html

}
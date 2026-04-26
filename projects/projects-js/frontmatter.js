export function parseFrontmatter(text){
    const match = text.match(/---([\s\S]*?)---([\s\S]*)/)
    
    if (!match) {
        return {data: {}, body: text}
    }
    
    const fm = match[1].trim()
    const body = match[2].trim()
    
    const data = {}
    let currentKey = null
    let inObject = false
    
    fm.split("\n").forEach(line => {
        const trimmed = line.trim()
        
        if (!trimmed) return
        
        // Check if line starts a new key
        if (trimmed.includes(":") && !line.startsWith(" ")) {
            const [key, ...rest] = trimmed.split(":")
            const value = rest.join(":").trim()
            
            // Check if value starts an object (empty after colon)
            if (!value) {
                currentKey = key.trim()
                data[currentKey] = {}
                inObject = true
            } else {
                currentKey = key.trim()
                data[currentKey] = value.replace(/["']/g, '') // Remove quotes
                inObject = false
            }
        } 
        // Handle object properties (indented lines)
        else if (inObject && currentKey && trimmed.includes(":")) {
            const [key, ...rest] = trimmed.split(":")
            const value = rest.join(":").trim().replace(/["']/g, '') // Remove quotes
            data[currentKey][key.trim()] = value
        }
    })
    
    return {data, body}
}
import { parseFrontmatter } from "/projects/projects-js/frontmatter.js";
import { renderMarkdown } from "/projects/projects-js/markdown-renderer.js";
import { parseTables } from "/projects/projects-js/table-parser.js";

// Import Preview Tools
import { renderColorTokens } from "/projects/projects-js/token-preview.js";
import { renderColorPreview } from "/projects/projects-js/color-preview.js";
import { renderTokenBlocks } from "/projects/projects-js/token-blocks.js";

// Import UI Components
import { renderComponents } from "/projects/projects-js/component-preview.js";
import { renderGallery } from "/projects/projects-js/gallery-renderer.js";
import { renderCaseStudy } from "/projects/projects-js/case-study.js";

/**
 * SOLUSI: Fungsi untuk membersihkan karakter "hantu" (NBSP) 
 * yang merusak parser Markdown dan Tabel.
 */
function cleanMarkdownContent(text) {
    return text
        .replace(/\u00A0/g, " ")  // Ubah Non-Breaking Space menjadi spasi biasa
        .replace(/—/g, "-")       // Ubah em-dash menjadi dash standar
        .trim();
}

/**
 * FUNGSI 1: Load daftar project di halaman utama (index/listing)
 */
async function loadProjects() {
    const container = document.querySelector("#projects");
    if (!container) return; // Keluar jika bukan di halaman listing

    try {
        const manifest = await fetch("/projects/contents/manifest.json");
        const files = await manifest.json();

        for (const file of files) {
            const res = await fetch(file);
            const text = await res.text();
            const { data } = parseFrontmatter(text);

            const card = document.createElement("a");
            card.href = `/project.html?slug=${data.slug}`;
            card.className = "project-card";
            card.innerHTML = `
                <img src="${data.cover}" alt="${data.title}">
                <h3>${data.title}</h3>
                <p>${data.client} · ${data.year}</p>
            `;
            container.appendChild(card);
        }
    } catch (err) {
        console.error("Gagal memuat daftar project:", err);
    }
}

/**
 * HELPER: Membuat Table of Contents secara otomatis
 */
function generateTOC() {
    const headings = document.querySelectorAll("#project-body h2");
    const toc = document.querySelector("#toc");
    if (!toc) return;

    toc.innerHTML = ""; // Bersihkan TOC lama
    headings.forEach((heading, i) => {
        const id = "section-" + i;
        heading.id = id;
        const link = document.createElement("a");
        link.href = "#" + id;
        link.textContent = heading.textContent;
        toc.appendChild(link);
    });
}

/**
 * FUNGSI 2: Load detail project berdasarkan slug (project.html)
 */
async function loadProject() {
    const params = new URLSearchParams(location.search);
    const slug = params.get("slug");
    if (!slug) return; // Keluar jika tidak ada slug di URL

    try {
        const manifest = await fetch("/projects/contents/manifest.json");
        const files = await manifest.json();

        for (const file of files) {
            const res = await fetch(file);
            const text = await res.text();
            const { data, body } = parseFrontmatter(text);

            if (data.slug === slug) {
                // Update Metadata Halaman
                document.title = data.title;
                document.querySelector("#title").textContent = data.title;
                document.querySelector("#client").textContent = data.client;
                document.querySelector("#year").textContent = data.year;
                document.querySelector("#role").textContent = data.role;

                // Render Project Link Buttons jika ada
                if (data.link) {
                    const projectMeta = document.querySelector(".project-meta");
                    
                    // Multiple links - create button for each (only if URL exists)
                    Object.entries(data.link).forEach(([key, url]) => {
                        // Skip if URL is empty, undefined, or just whitespace
                        if (url && url.trim() !== '') {
                            const linkButton = document.createElement("a");
                            linkButton.href = url;
                            linkButton.className = "btn";
                            linkButton.textContent = key;
                            linkButton.target = "_blank";
                            linkButton.rel = "noopener noreferrer";
                            projectMeta.appendChild(linkButton);
                        }
                    });
                }

                // --- BAGIAN SOLUSI ---
                // Bersihkan body dari karakter NBSP sebelum diproses parser
                const sanitizedBody = cleanMarkdownContent(body);

                // Jalankan parser tabel terlebih dahulu
                let html = parseTables(sanitizedBody);
                
                // Kemudian jalankan parser markdown umum
                html = renderMarkdown(html);
                // ---------------------

                // Render ke DOM
                const bodyContainer = document.querySelector("#project-body");
                bodyContainer.innerHTML = html;

                // Jalankan Post-Rendering Tools
                generateTOC();
                renderColorTokens();
                renderComponents();
                renderGallery();
                renderCaseStudy();
                
                break; // Hentikan loop jika slug sudah ketemu
            }
        }
    } catch (err) {
        console.error("Gagal memuat detail project:", err);
    }
}

// Inisialisasi sesuai halaman
loadProjects();
loadProject();
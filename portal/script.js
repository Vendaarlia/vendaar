document.addEventListener('DOMContentLoaded', () => {
  const identityPanel = document.getElementById('identity-panel');
  const linksFeed = document.getElementById('links-feed');

  fetch('./data.json')
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP ${response.status}: Unable to load hub data`);
      }
      return response.json();
    })
    .then((data) => {
      renderProfile(data.profile);
      renderLinks(data.links);
      animateHub();
    })
    .catch((error) => {
      console.error('Personal Digital Hub:', error);
      if (linksFeed) {
        linksFeed.innerHTML = '<p class="error-msg">Unable to load links right now. Please try again later.</p>';
      }
    });

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  function renderProfile(profile) {
    if (!identityPanel || !profile) return;

    identityPanel.innerHTML = `
      <div class="avatar-wrap">
        <img class="avatar" src="${escapeHtml(profile.avatar_url)}" alt="${escapeHtml(profile.name)}">
        <span class="status-dot" aria-label="Available for work"></span>
      </div>
      <h1 class="profile-name">${escapeHtml(profile.name)}</h1>
      <p class="profile-bio">${escapeHtml(profile.bio)}</p>
      <div class="badge-row">
        <span class="glass-badge">Open to work</span>
        <span class="glass-badge">UI Engineer</span>
      </div>
      <div class="profile-meta">
        <span><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Remote</span>
        <span><i class="fa-solid fa-bolt" aria-hidden="true"></i> Fast turnaround</span>
      </div>
    `;
  }

  function renderLinks(links) {
    if (!linksFeed || !Array.isArray(links)) return;

    const fragment = document.createDocumentFragment();

    links.forEach((link) => {
      const a = document.createElement('a');
      a.href = link.url;
      a.target = '_blank';
      a.rel = 'noopener noreferrer';
      a.className = 'link-card';
      a.setAttribute('aria-label', `${escapeHtml(link.title)} (opens in new tab)`);

      a.innerHTML = `
        <span class="link-icon"><i class="${escapeHtml(link.icon_class)}" aria-hidden="true"></i></span>
        <span class="link-text">
          <span class="link-title">${escapeHtml(link.title)}</span>
          <span class="link-desc">${escapeHtml(link.description)}</span>
          <span class="link-url">${escapeHtml(cleanUrl(link.url))}</span>
        </span>
        <span class="link-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
      `;

      fragment.appendChild(a);
    });

    linksFeed.appendChild(fragment);
  }

  function cleanUrl(url) {
    try {
      const parsed = new URL(url);
      return parsed.hostname.replace(/^www\./, '');
    } catch {
      return url;
    }
  }

  function animateHub() {
    if (typeof gsap === 'undefined') return;

    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    tl.from('.identity-panel > *', {
      y: 24,
      opacity: 0,
      duration: 0.8,
      stagger: 0.1,
    })
    .from(
      '.link-card',
      {
        y: 20,
        opacity: 0,
        duration: 0.6,
        stagger: 0.08,
      },
      '-=0.4'
    );
  }
});

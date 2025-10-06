const cities = [
  { id: 'jakarta', name: 'Jakarta', prov: 'DKI Jakarta', lat: -6.2088, lon: 106.8456 },
  { id: 'surabaya', name: 'Surabaya', prov: 'Jawa Timur', lat: -7.2575, lon: 112.7521 },
  { id: 'bandung', name: 'Bandung', prov: 'Jawa Barat', lat: -6.9175, lon: 107.6191 },
  { id: 'medan', name: 'Medan', prov: 'Sumatera Utara', lat: 3.5952, lon: 98.6722 },
  { id: 'semarang', name: 'Semarang', prov: 'Jawa Tengah', lat: -6.9667, lon: 110.4167 },
  { id: 'makassar', name: 'Makassar', prov: 'Sulawesi Selatan', lat: -5.1477, lon: 119.4327 },
  { id: 'denpasar', name: 'Denpasar', prov: 'Bali', lat: -8.65, lon: 115.2167 },
  { id: 'yogyakarta', name: 'Yogyakarta', prov: 'DI Yogyakarta', lat: -7.7971, lon: 110.3688 },
  { id: 'palembang', name: 'Palembang', prov: 'Sumatera Selatan', lat: -2.9761, lon: 104.7754 },
  { id: 'balikpapan', name: 'Balikpapan', prov: 'Kalimantan Timur', lat: -1.2671, lon: 116.8316 }
];

const idFormatterLong = new Intl.DateTimeFormat('id-ID', { weekday: 'long', day: '2-digit', month: 'short', year: 'numeric' });
const idFormatterShort = new Intl.DateTimeFormat('id-ID', { weekday: 'short', day: '2-digit', month: 'short' });

function formatLong(date) {
  return idFormatterLong.format(date);
}
function formatShort(date) {
  return idFormatterShort.format(date);
}

function createSeededRng(seed) {
  let m = 2 ** 32;
  let a = 1664525;
  let c = 1013904223;
  let state = seed >>> 0;
  return function () {
    state = (a * state + c) % m;
    return state / m;
  };
}

function getEpochDaySeed(lat, lon, date) {
  const epochDay = Math.floor(date.getTime() / (24 * 60 * 60 * 1000));
  const latInt = Math.round((lat + 90) * 1000);
  const lonInt = Math.round((lon + 180) * 1000);
  let seed = (latInt * 73856093) ^ (lonInt * 19349663) ^ (epochDay * 83492791);
  seed = seed >>> 0;
  return seed;
}

function generateForecast(city, date = new Date(), days = 3) {
  const seed0 = getEpochDaySeed(city.lat, city.lon, date);
  const rng = createSeededRng(seed0);

  const absLat = Math.abs(city.lat);
  const baseTemp = 30 - Math.min(25, absLat / 3);
  let altAdjustment = 0;
  const lcName = city.name.toLowerCase();
  if (lcName.includes('bandung') || lcName.includes('yogyakarta')) altAdjustment = -4;
  let baseHumidity = 60 + Math.max(0, 25 - absLat / 2);

  const dailyRng = createSeededRng(seed0 ^ 0xA5A5A5A5);
  const dayOfYear = Math.floor((date - new Date(date.getFullYear(),0,0)) / (24*60*60*1000));
  const seasonal = Math.sin((2 * Math.PI * dayOfYear) / 365);

  let meanTemp = baseTemp + altAdjustment + (seasonal * 3) + (dailyRng() - 0.5) * 2;
  const diurnal = 3 + dailyRng() * 4;
  const tempMax = Math.round(meanTemp + Math.abs(diurnal));
  const tempMin = Math.round(meanTemp - Math.abs(diurnal * 0.6));

  let popValue = Math.min(0.95, Math.max(0.03, (baseHumidity - 50) / 100 + (dailyRng() - 0.4) * 0.5));
  let humidity = Math.round(Math.min(98, Math.max(30, baseHumidity + (dailyRng() - 0.4) * 20)));
  let windKmh = Math.round(5 + dailyRng() * 25);

  function chooseCondition(pop, rngVal) {
    if (pop > 0.6 && rngVal > 0.3) return 'rain';
    if (pop > 0.45 && rngVal > 0.6) return 'storm';
    if (humidity > 85 && rngVal < 0.25) return 'fog';
    if (rngVal < 0.35) return 'clear';
    if (rngVal < 0.7) return 'cloud';
    return 'cloud';
  }

  const condKey = chooseCondition(popValue, dailyRng());

  const current = {
    date: new Date(date),
    temp: Math.round((tempMax + tempMin) / 2),
    min: tempMin,
    max: tempMax,
    cond: conditionLabel(condKey),
    iconKey: condKey,
    humidity,
    windKmh,
    pop: Math.round(popValue * 100)
  };

  const daily = [];
  for (let i = 1; i <= days; i++) {
    const d = new Date(date);
    d.setDate(d.getDate() + i);
    const seedDi = getEpochDaySeed(city.lat, city.lon, d) ^ (i * 0x9E3779B1);
    const r = createSeededRng(seedDi);
    const seasonalI = Math.sin((2 * Math.PI * (dayOfYear + i)) / 365);
    const meanTi = baseTemp + altAdjustment + seasonalI * 3 + (r() - 0.5) * 2;
    const diurnalI = 3 + r() * 5;
    const maxI = Math.round(meanTi + Math.abs(diurnalI));
    const minI = Math.round(meanTi - Math.abs(diurnalI * 0.6));
    const popI = Math.min(0.98, Math.max(0.03, (baseHumidity - 50) / 100 + (r() - 0.4) * 0.6));
    const humidityI = Math.round(Math.min(98, Math.max(30, baseHumidity + (r() - 0.4) * 22)));
    const windI = Math.round(5 + r() * 28);
    const condI = chooseCondition(popI, r());
    daily.push({
      date: d,
      min: minI,
      max: maxI,
      cond: conditionLabel(condI),
      iconKey: condI,
      pop: Math.round(popI * 100),
      humidity: humidityI,
      windKmh: windI
    });
  }

  return { city, current, daily };
}

function conditionLabel(key) {
  switch (key) {
    case 'clear': return 'Cerah';
    case 'cloud': return 'Berawan';
    case 'rain': return 'Hujan';
    case 'storm': return 'Hujan Lebat';
    case 'fog': return 'Berkabut';
    default: return 'Cerah';
  }
}

function getWeatherIcon(key, size = 64) {
  const s = size;
  switch (key) {
    case 'clear':
      return `<svg class="icon-svg" width="${s}" height="${s}" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
        <circle cx="32" cy="32" r="12" fill="#FFD166"/>
        <g stroke="#FFD166" stroke-width="2" stroke-linecap="round">
          <line x1="32" y1="4" x2="32" y2="14"/>
          <line x1="32" y1="50" x2="32" y2="60"/>
          <line x1="4" y1="32" x2="14" y2="32"/>
          <line x1="50" y1="32" x2="60" y2="32"/>
          <line x1="10" y1="10" x2="18" y2="18"/>
          <line x1="46" y1="46" x2="54" y2="54"/>
          <line x1="10" y1="54" x2="18" y2="46"/>
          <line x1="46" y1="18" x2="54" y2="10"/>
        </g>
      </svg>`;
    case 'cloud':
      return `<svg width="${s}" height="${s}" viewBox="0 0 64 64" aria-hidden="true"><g>
        <ellipse cx="30" cy="36" rx="18" ry="10" fill="#E6EEF8"></ellipse>
        <ellipse cx="42" cy="32" rx="12" ry="8" fill="#E6EEF8"></ellipse>
        <ellipse cx="20" cy="32" rx="10" ry="7" fill="#E6EEF8"></ellipse>
      </g></svg>`;
    case 'rain':
      return `<svg width="${s}" height="${s}" viewBox="0 0 64 64" aria-hidden="true">
        <g>
          <ellipse cx="30" cy="28" rx="18" ry="10" fill="#E6EEF8"></ellipse>
          <ellipse cx="42" cy="24" rx="12" ry="8" fill="#E6EEF8"></ellipse>
          <path d="M22 40c1 4 3 6 3 8" stroke="#4EA3FF" stroke-linecap="round" stroke-width="3"/>
          <path d="M32 40c1 5 3 7 3 9" stroke="#4EA3FF" stroke-linecap="round" stroke-width="3"/>
          <path d="M42 40c1 4 3 6 3 8" stroke="#4EA3FF" stroke-linecap="round" stroke-width="3"/>
        </g>
      </svg>`;
    case 'storm':
      return `<svg width="${s}" height="${s}" viewBox="0 0 64 64" aria-hidden="true">
        <g>
          <ellipse cx="30" cy="28" rx="18" ry="10" fill="#E6EEF8"></ellipse>
          <path d="M36 36 L28 50 L34 50 L26 64" stroke="#FFDD57" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M22 40c1 4 3 6 3 8" stroke="#4EA3FF" stroke-linecap="round" stroke-width="3"/>
        </g>
      </svg>`;
    case 'fog':
      return `<svg width="${s}" height="${s}" viewBox="0 0 64 64" aria-hidden="true">
        <g>
          <ellipse cx="32" cy="28" rx="18" ry="9" fill="#EEF2F6"></ellipse>
          <rect x="12" y="40" width="40" height="4" rx="2" fill="#EEF2F6"></rect>
          <rect x="8" y="48" width="48" height="4" rx="2" fill="#EEF2F6"></rect>
        </g>
      </svg>`;
    default:
      return getWeatherIcon('clear', size);
  }
}

function updateDOM(forecast) {
  const container = document.getElementById('weatherCard');
  container.classList.remove('fade-in');
  void container.offsetWidth;
  container.classList.add('fade-in');

  const city = forecast.city;
  const cur = forecast.current;
  const daily = forecast.daily;

  const titleHtml = `
    <div class="top">
      <div class="city-info">
        <div>
          <div class="city-name">${escapeHtml(city.name)} — <span class="date-text">${formatLong(cur.date)}</span></div>
          <div class="date-text">${escapeHtml(city.prov)}</div>
        </div>
      </div>
      <div class="current" aria-hidden="false">
        <div class="icon" role="img" aria-label="${cur.cond} icon">${getWeatherIcon(cur.iconKey, 72)}</div>
        <div>
          <div class="temp">${cur.temp}°C</div>
          <div class="desc">${cur.cond}</div>
          <div class="stats" style="margin-top:6px;">
            <div class="stat">💧 ${cur.humidity}%</div>
            <div class="stat">🌬️ ${cur.windKmh} km/h</div>
            <div class="stat">☂️ ${cur.pop}%</div>
          </div>
        </div>
      </div>
    </div>
  `;

  let forecastHtml = `<div class="forecast"><h3 style="margin:0 0 8px 0; font-size:1rem;">Prakiraan 3 Hari</h3><div class="forecast-grid">`;
  daily.forEach(d => {
    forecastHtml += `
      <div class="fday" role="group" aria-label="Prakiraan ${formatShort(d.date)}">
        <div class="date">${formatShort(d.date)}</div>
        <div class="icon-small" aria-hidden="true" style="margin:8px 0;">
          ${getWeatherIcon(d.iconKey,48)}
        </div>
        <div class="temps">${d.min}° / ${d.max}°</div>
        <div style="font-size:0.85rem; color:var(--muted); margin-top:6px;">${d.cond}</div>
        <div style="font-size:0.75rem; color:var(--muted); margin-top:6px;">Hujan ${d.pop}%</div>
      </div>
    `;
  });
  forecastHtml += `</div></div>`;

  container.innerHTML = titleHtml + forecastHtml;
  container.setAttribute('aria-live', 'polite');
}

function escapeHtml(text) {
  if (!text) return '';
  return String(text).replace(/[&<>"']/g, function (m) {
    return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[m];
  });
}

document.addEventListener('DOMContentLoaded', () => {
  const select = document.getElementById('citySelect');
  const btn = document.getElementById('showBtn');
  const message = document.getElementById('message');

  select.innerHTML = cities.map(c => `<option value="${c.id}">${c.name} — ${c.prov}</option>`).join('');

  const defaultId = cities.find(c => c.id === 'jakarta') ? 'jakarta' : cities[0].id;
  select.value = defaultId;

  function renderForSelectedCity(doShowMessage = true) {
    const id = select.value;
    const city = cities.find(c => c.id === id);
    const weatherCard = document.getElementById('weatherCard');
    if (!city) {
      message.hidden = false;
      message.textContent = 'Kota tidak ditemukan.';
      weatherCard.innerHTML = '';
      return;
    }
    if (doShowMessage) {
      message.hidden = true;
      message.textContent = '';
    }
    try {
      const forecast = generateForecast(city, new Date(), 3);
      updateDOM(forecast);
    } catch (err) {
      message.hidden = false;
      message.textContent = 'Terjadi kesalahan saat menghasilkan prakiraan.';
      console.error(err);
    }
  }

  renderForSelectedCity(false);

  select.addEventListener('change', () => {
    renderForSelectedCity(true);
  });

  btn.addEventListener('click', () => {
    renderForSelectedCity(true);
    select.focus();
  });

  // 🌧️ Tambahan animasi hujan
  const rainContainer = document.querySelector(".rain");
  for (let i = 0; i < 120; i++) {
    const drop = document.createElement("div");
    drop.classList.add("drop");

    drop.style.left = Math.random() * 100 + "vw";
    const delay = Math.random() * -20;
    const duration = 0.5 + Math.random() * 1.5;

    drop.style.animationDuration = duration + "s";
    drop.style.animationDelay = delay + "s";

    const scale = 0.5 + Math.random();
    drop.style.transform = `scale(${scale}, ${scale * 2})`;

    rainContainer.appendChild(drop);
  }
});

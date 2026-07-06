document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("companies-json");
  const dataElement = document.getElementById("keyo-companies-data");

  const countrySelect = document.getElementById("filter-country");
  const hasSiteCheckbox = document.getElementById("filter-has-site");

  if (!container || !dataElement) {
    return;
  }

  const companies = JSON.parse(dataElement.textContent);

  if (!companies.length) {
    container.innerHTML =
      '<p class="companies-not-found">Компаний не найдено.</p>';
    return;
  }

  const countries = [];

  companies.forEach(function (company) {
    company.countries.forEach(function (country) {
      if (!countries.includes(country)) {
        countries.push(country);
      }
    });
  });

  countries.forEach(function (country) {
    const option = document.createElement("option");
    option.value = country;
    option.textContent = country;
    countrySelect.appendChild(option);
  });

  function render(companiesList) {
    container.innerHTML = "";

    if (!companiesList.length) {
      container.innerHTML =
        '<p class="companies-not-found">Нет компаний, соответствующих фильтрам.</p>';
      return;
    }

    companiesList.forEach(function (company) {
      let html = '<div class="company-card">';

      if (company.logo) {
        html += `
          <div class="company-logo">
            <img src="${company.logo}" alt="${company.name}" loading="lazy">
          </div>
        `;
      }

      html += '<div class="company-content">';
      html += `<h2 class="company-title">${company.name}</h2>`;

      if (company.countries.length || company.activities.length) {
        html += '<div class="card-meta">';

        if (company.countries.length) {
          html += `
            <span class="meta-item">
              <strong>Страна:</strong> ${company.countries.join(", ")}
            </span>
          `;
        }

        if (company.activities.length) {
          html += `
            <span class="meta-item">
              <strong>Деятельность:</strong> ${company.activities.join(", ")}
            </span>
          `;
        }

        html += "</div>";
      }

      if (company.description) {
        html += `
          <div class="company-desc">
            <p>${company.description}</p>
          </div>
        `;
      }

      if (company.website) {
        html += `
          <div class="company-action">
            <a class="company-link" href="${company.website}" target="_blank" rel="noopener noreferrer">
              Посетить сайт
            </a>
          </div>
        `;
      }

      html += "</div></div>";

      container.insertAdjacentHTML("beforeend", html);
    });
  }

  function filterCompanies() {
    const country = countrySelect.value;
    const hasSite = hasSiteCheckbox.checked;

    const filtered = companies.filter(function (company) {
      let show = true;

      if (country && !company.countries.includes(country)) {
        show = false;
      }

      if (hasSite && !company.website) {
        show = false;
      }

      return show;
    });

    render(filtered);
  }

  countrySelect.addEventListener("change", filterCompanies);
  hasSiteCheckbox.addEventListener("change", filterCompanies);

  render(companies);
});
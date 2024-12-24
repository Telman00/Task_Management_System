// Dinamik bölmə idarəetməsi
document.querySelectorAll('.nav-link').forEach((link) => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
  
      // Bütün bölmələri gizlət
      document.querySelectorAll('.section-content').forEach((section) => {
        section.classList.add('d-none');
      });
  
      // Klik edilən linkin id-sini tap
      const sectionId = this.textContent.trim().toLowerCase() + '-section';
  
      // Uyğun bölməni göstər
      const targetSection = document.getElementById(sectionId);
      if (targetSection) {
        targetSection.classList.remove('d-none');
      }
    });
  });

// Calendar generation
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function generateCalendar(month, year) {
  const calendarSection = document.getElementById('calendar-section');
  calendarSection.innerHTML = `<h2>${monthNames[month]} ${year}</h2>`;

  const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  const calendarTable = `
    <table class="table table-bordered table-responsive">
      <tr>${daysOfWeek.map(day => `<th>${day}</th>`).join('')}</tr>
      ${generateCalendarRows(month, year)}
    </table>
  `;
  calendarSection.innerHTML += calendarTable;
}

function generateCalendarRows(month, year) {
  const date = new Date(year, month, 1);
  const firstDayIndex = date.getDay();
  const lastDay = new Date(year, month + 1, 0).getDate();
  let rows = '<tr>' + '<td></td>'.repeat(firstDayIndex);

  for (let day = 1; day <= lastDay; day++) {
    if ((firstDayIndex + day - 1) % 7 === 0 && day > 1) rows += '</tr><tr>';
    rows += `<td>${day}</td>`;
  }
  return rows + '</tr>';
}

document.addEventListener('DOMContentLoaded', () => {
  generateCalendar(currentMonth, currentYear);

  const currentMonthYearElement = document.getElementById('current-month-year');
  if (currentMonthYearElement) {
    currentMonthYearElement.addEventListener('click', () => {
      const yearMonthModal = new bootstrap.Modal(document.getElementById('yearMonthModal'));
      document.getElementById('current-year').textContent = currentYear;
      generateMonthTable();
      yearMonthModal.show();
    });
  }

  window.addEventListener('resize', () => {
    generateCalendar(currentMonth, currentYear);
  });
});

function generateMonthTable() {
  const monthTable = document.getElementById('month-table');
  monthTable.innerHTML = monthNames.map((month, index) => `
    <tr>
      <td style="cursor: pointer;" onclick="selectMonth(${index})">${month}</td>
    </tr>
  `).join('');
}

function selectMonth(month) {
  currentMonth = month;
  generateCalendar(currentMonth, currentYear);
  document.getElementById('current-month-year').textContent = `${monthNames[currentMonth]} ${currentYear}`;
  bootstrap.Modal.getInstance(document.getElementById('yearMonthModal')).hide();
}

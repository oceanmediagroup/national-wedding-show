const locationFilter = (location) => {
    return `<li class="filter"><label><input type="checkbox" name="checkbox" class="filter-checkbox" value="${location.id}">${location.name}</label></li>`;
};

export default locationFilter;
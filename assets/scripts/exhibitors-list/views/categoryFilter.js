const categoryFilter = (category) => {
    // console.log(category);

    return `<li class="filter"><label><input type="checkbox" name="checkbox" class="filter-checkbox" value="${category.id}">${category.name}</label></li>`;
};

export default categoryFilter;
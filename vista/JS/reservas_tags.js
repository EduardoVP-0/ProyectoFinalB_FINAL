const tags = document.querySelectorAll('.tag-item');

const contentSections = document.querySelectorAll('[data-content]');

tags.forEach(tag => {
    tag.addEventListener('click', function() {
        tags.forEach(t => t.classList.remove('active'));

        contentSections.forEach(content => content.style.display = 'none');

        this.classList.add('active');

        const targetContent = document.querySelector(this.getAttribute('data-target'));
        targetContent.style.display = 'block';
    });
});

window.addEventListener('DOMContentLoaded', () => {
    const defaultTag = document.querySelector('.tag-item'); 
    const defaultContent = document.querySelector(defaultTag.getAttribute('data-target'));

    defaultTag.classList.add('active');
    
    defaultContent.style.display = 'block';
});
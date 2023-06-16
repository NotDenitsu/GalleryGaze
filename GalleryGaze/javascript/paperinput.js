function autoResize(textarea) {
    const lineHeight = 15; // Desired height increment
    const minHeight = 35; // Initial height
    textarea.style.height = `${minHeight}px`;

    const currentRows = Math.floor((textarea.scrollHeight - minHeight) / lineHeight);
    textarea.style.height = `${minHeight + (currentRows * lineHeight)}px`;
}
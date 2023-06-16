function autoResize(textarea) {
    const lineHeight = 1; // Desired height increment
    const minHeight = 40; // Initial height
    textarea.style.height = `${minHeight}px`;

    const currentRows = Math.floor((textarea.scrollHeight - minHeight) / lineHeight);
    textarea.style.height = `${minHeight + (currentRows * lineHeight)}px`;
}
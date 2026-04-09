// Easter Eggs en Interactieve Features voor Voedselbank Maaskantje

// 1. Klik counter voor achtergrond verandering
let clickCount = 0;
let isRedBackground = false;

// 2. Floating food emojis
const foodEmojis = ['🍎', '🥖', '🥕', '🍌', '🥦', '🍊', '🥔', '🍅', '🥒', '🧀', '🥛', '🍞'];

// 3. Konami code easter egg
let konamiCode = [];
const konamiSequence = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initLogoClickCounter();
    initKonamiCode();
    initRandomFoodBackground();
    initHoverEffects();
    initConfettiOnSuccess();
});

// Feature 1: Logo click counter (10 clicks = red background)
function initLogoClickCounter() {
    const logo = document.querySelector('nav a[href*="dashboard"]');
    if (!logo) return;

    logo.addEventListener('click', function(e) {
        clickCount++;
        
        // Add shake animation
        logo.style.animation = 'shake 0.3s';
        setTimeout(() => logo.style.animation = '', 300);

        if (clickCount === 10) {
            toggleRedBackground();
            clickCount = 0;
        }

        // Show click counter tooltip
        showClickTooltip(logo, clickCount);
    });
}

function toggleRedBackground() {
    const body = document.body;
    
    if (!isRedBackground) {
        body.style.transition = 'background-color 1s ease';
        body.style.backgroundColor = '#fee2e2'; // Light red
        showNotification('🔴 Rode modus geactiveerd!', 'error');
        createFireworks();
    } else {
        body.style.backgroundColor = '#fdf6ec'; // Original cream
        showNotification('✅ Normale modus hersteld!', 'success');
    }
    
    isRedBackground = !isRedBackground;
}

function showClickTooltip(element, count) {
    const tooltip = document.createElement('div');
    tooltip.textContent = `${count}/10`;
    tooltip.style.cssText = `
        position: absolute;
        background: #ea580c;
        color: white;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
        pointer-events: none;
        z-index: 9999;
        animation: fadeOut 1s forwards;
    `;
    
    const rect = element.getBoundingClientRect();
    tooltip.style.left = rect.right + 10 + 'px';
    tooltip.style.top = rect.top + 'px';
    
    document.body.appendChild(tooltip);
    setTimeout(() => tooltip.remove(), 1000);
}

// Feature 2: Konami Code (↑↑↓↓←→←→BA)
function initKonamiCode() {
    document.addEventListener('keydown', function(e) {
        konamiCode.push(e.key);
        konamiCode = konamiCode.slice(-10);
        
        if (konamiCode.join(',') === konamiSequence.join(',')) {
            activateKonamiMode();
            konamiCode = [];
        }
    });
}

function activateKonamiMode() {
    showNotification('🎮 Konami Code Activated! 🎉', 'success');
    createRainbowMode();
    spawnFloatingFood(20);
}

// Feature 3: Random food background pattern
function initRandomFoodBackground() {
    // Add subtle food pattern to background
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px) rotate(-5deg); }
            75% { transform: translateX(5px) rotate(5deg); }
        }
        
        @keyframes fadeOut {
            to { opacity: 0; transform: translateY(-20px); }
        }
        
        @keyframes rainbow {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }
        
        .floating-food {
            position: fixed;
            font-size: 2rem;
            pointer-events: none;
            z-index: 9999;
            animation: float 3s ease-in-out infinite;
        }
        
        .rainbow-mode {
            animation: rainbow 3s linear infinite;
        }
    `;
    document.head.appendChild(style);
}

// Feature 4: Hover effects on cards
function initHoverEffects() {
    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Random subtle rotation on hover
            const rotation = (Math.random() - 0.5) * 2;
            this.style.transform = `scale(1.02) rotate(${rotation}deg)`;
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
}

// Feature 5: Confetti on success messages
function initConfettiOnSuccess() {
    const successMessages = document.querySelectorAll('.bg-green-50');
    
    successMessages.forEach(msg => {
        if (msg.textContent.includes('succesvol')) {
            createConfetti(msg);
        }
    });
}

// Helper: Create floating food
function spawnFloatingFood(count) {
    for (let i = 0; i < count; i++) {
        setTimeout(() => {
            const food = document.createElement('div');
            food.className = 'floating-food';
            food.textContent = foodEmojis[Math.floor(Math.random() * foodEmojis.length)];
            food.style.left = Math.random() * window.innerWidth + 'px';
            food.style.top = Math.random() * window.innerHeight + 'px';
            food.style.animationDelay = Math.random() * 2 + 's';
            
            document.body.appendChild(food);
            
            setTimeout(() => food.remove(), 5000);
        }, i * 100);
    }
}

// Helper: Create fireworks effect
function createFireworks() {
    const colors = ['#ea580c', '#fb923c', '#fdba74', '#fed7aa'];
    
    for (let i = 0; i < 30; i++) {
        setTimeout(() => {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: fixed;
                width: 8px;
                height: 8px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                border-radius: 50%;
                pointer-events: none;
                z-index: 9999;
                left: 50%;
                top: 50%;
            `;
            
            document.body.appendChild(particle);
            
            const angle = (Math.PI * 2 * i) / 30;
            const velocity = 5 + Math.random() * 5;
            const vx = Math.cos(angle) * velocity;
            const vy = Math.sin(angle) * velocity;
            
            let x = 0, y = 0;
            const animate = () => {
                x += vx;
                y += vy;
                particle.style.transform = `translate(${x}px, ${y}px)`;
                particle.style.opacity = 1 - (Math.abs(x) + Math.abs(y)) / 300;
                
                if (particle.style.opacity > 0) {
                    requestAnimationFrame(animate);
                } else {
                    particle.remove();
                }
            };
            animate();
        }, i * 20);
    }
}

// Helper: Create confetti
function createConfetti(element) {
    const rect = element.getBoundingClientRect();
    const confettiColors = ['#ea580c', '#fb923c', '#22c55e', '#3b82f6', '#a855f7'];
    
    for (let i = 0; i < 15; i++) {
        setTimeout(() => {
            const confetti = document.createElement('div');
            confetti.style.cssText = `
                position: fixed;
                width: 6px;
                height: 12px;
                background: ${confettiColors[Math.floor(Math.random() * confettiColors.length)]};
                pointer-events: none;
                z-index: 9999;
                left: ${rect.left + rect.width / 2}px;
                top: ${rect.top}px;
            `;
            
            document.body.appendChild(confetti);
            
            const angle = Math.random() * Math.PI * 2;
            const velocity = 3 + Math.random() * 3;
            let x = 0, y = 0, rotation = 0;
            
            const animate = () => {
                x += Math.cos(angle) * velocity;
                y += Math.sin(angle) * velocity + 2; // gravity
                rotation += 10;
                confetti.style.transform = `translate(${x}px, ${y}px) rotate(${rotation}deg)`;
                
                if (y < 300) {
                    requestAnimationFrame(animate);
                } else {
                    confetti.remove();
                }
            };
            animate();
        }, i * 30);
    }
}

// Helper: Rainbow mode
function createRainbowMode() {
    document.body.classList.add('rainbow-mode');
    setTimeout(() => {
        document.body.classList.remove('rainbow-mode');
    }, 5000);
}

// Helper: Show notification
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#22c55e' : '#ef4444'};
        color: white;
        padding: 16px 24px;
        border-radius: 12px;
        font-weight: bold;
        z-index: 9999;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        animation: slideIn 0.3s ease-out;
    `;
    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(400px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.3s ease-out forwards';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Feature 6: Double click on stats cards for animation
document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.card');
    
    statCards.forEach(card => {
        card.addEventListener('dblclick', function() {
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = 'float 1s ease-in-out';
            }, 10);
            
            // Spawn food emoji
            const emoji = foodEmojis[Math.floor(Math.random() * foodEmojis.length)];
            const emojiEl = document.createElement('div');
            emojiEl.textContent = emoji;
            emojiEl.style.cssText = `
                position: fixed;
                font-size: 3rem;
                pointer-events: none;
                z-index: 9999;
                left: ${this.getBoundingClientRect().left + this.offsetWidth / 2}px;
                top: ${this.getBoundingClientRect().top}px;
                animation: fadeOut 2s forwards;
            `;
            document.body.appendChild(emojiEl);
            setTimeout(() => emojiEl.remove(), 2000);
        });
    });
});

<!-- Login Modal -->
<div id="loginModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999;">
    <!-- Backdrop with blur -->
    <div onclick="closeLoginModal()" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);"></div>
    
    <!-- Modal Content -->
    <div style="position: relative; max-width: 450px; margin: 5% auto; background: white; border-radius: 16px; padding: 40px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);">
        <!-- Close Button -->
        <button onclick="closeLoginModal()" style="position: absolute; top: 20px; right: 20px; background: none; border: none; font-size: 24px; cursor: pointer; color: #666;">×</button>
        
        <!-- Logo -->
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 30px;">
            <svg viewBox="0 0 24 24" style="width: 32px; height: 32px; fill: #8b5cf6;">
                <rect x="2" y="6" width="20" height="12" rx="2"/>
                <circle cx="7" cy="19" r="2"/>
                <circle cx="17" cy="19" r="2"/>
            </svg>
            <span style="font-size: 1.5rem; font-weight: 700; color: #8b5cf6;">Rentlee</span>
        </div>

        <!-- Phone Number Form -->
        <div id="phoneForm">
            <h3 style="font-size: 1.1rem; margin-bottom: 8px; color: #1d1d1f;">Login to access amazing offers</h3>
            <p style="font-size: 1.3rem; font-weight: 600; margin-bottom: 25px; color: #1d1d1f;">Please share your contact number</p>
            
            <form onsubmit="generateOTP(event)">
                <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                    <select style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.95rem; background: #f8f8f8; width: 130px;">
                        <option>+91 (IND)</option>
                    </select>
                    <input type="tel" id="phoneNumber" placeholder="Mobile Number" required pattern="[0-9]{10}" style="flex: 1; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.95rem;">
                </div>

                <button type="submit" style="width: 100%; background: linear-gradient(135deg, #8b5cf6, #a855f7); color: white; border: none; padding: 14px; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 20px;">
                    Generate OTP
                </button>

                <div style="text-align: center; margin: 20px 0; color: #666;">or</div>

                <button type="button" style="width: 100%; background: white; border: 1px solid #ddd; padding: 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Sign up with Google
                </button>
            </form>
        </div>

        <!-- OTP Form (Hidden by default) -->
        <div id="otpForm" style="display: none;">
            <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 25px; color: #1d1d1f;">Enter the OTP send on whatsApp</h3>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <div>
                    <div style="font-weight: 600; color: #1d1d1f;" id="displayPhone">+91 7887885681</div>
                    <div style="font-size: 0.85rem; color: #666;">Mobile Number</div>
                </div>
                <button onclick="editNumber()" style="background: none; border: none; color: #8b5cf6; font-weight: 600; cursor: pointer;">Edit Number</button>
            </div>

            <form onsubmit="verifyOTP(event)">
                <label style="display: block; margin-bottom: 10px; color: #666; font-size: 0.9rem;">Enter OTP</label>
                <div style="display: flex; gap: 10px; margin-bottom: 20px; justify-content: center;">
                    <input type="text" maxlength="1" class="otp-input" style="width: 50px; height: 50px; text-align: center; font-size: 1.5rem; border: 1px solid #ddd; border-radius: 8px;" oninput="moveToNext(this, 1)">
                    <input type="text" maxlength="1" class="otp-input" style="width: 50px; height: 50px; text-align: center; font-size: 1.5rem; border: 1px solid #ddd; border-radius: 8px;" oninput="moveToNext(this, 2)">
                    <input type="text" maxlength="1" class="otp-input" style="width: 50px; height: 50px; text-align: center; font-size: 1.5rem; border: 1px solid #ddd; border-radius: 8px;" oninput="moveToNext(this, 3)">
                    <input type="text" maxlength="1" class="otp-input" style="width: 50px; height: 50px; text-align: center; font-size: 1.5rem; border: 1px solid #ddd; border-radius: 8px;" oninput="moveToNext(this, 4)">
                    <input type="text" maxlength="1" class="otp-input" style="width: 50px; height: 50px; text-align: center; font-size: 1.5rem; border: 1px solid #ddd; border-radius: 8px;" oninput="moveToNext(this, 5)">
                    <input type="text" maxlength="1" class="otp-input" style="width: 50px; height: 50px; text-align: center; font-size: 1.5rem; border: 1px solid #ddd; border-radius: 8px;">
                </div>

                <button type="submit" style="width: 100%; background: linear-gradient(135deg, #8b5cf6, #a855f7); color: white; border: none; padding: 14px; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 15px;">
                    Verify OTP
                </button>

                <p style="text-align: center; color: #666; font-size: 0.9rem;">
                    Didn't receive the OTP? Retry in <span id="timer" style="color: #8b5cf6; font-weight: 600;">00:25</span>
                </p>
            </form>

            <p style="text-align: center; margin-top: 30px; font-size: 0.85rem; color: #666;">
                By Signing in, I agree<br>
                <a href="#" style="color: #8b5cf6; text-decoration: none;">Terms & Conditions</a> & <a href="#" style="color: #8b5cf6; text-decoration: none;">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>

<script>
// Open login modal
function openLoginModal() {
    document.getElementById('loginModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

// Close login modal
function closeLoginModal() {
    document.getElementById('loginModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Generate OTP
function generateOTP(event) {
    event.preventDefault();
    const phone = document.getElementById('phoneNumber').value;
    document.getElementById('displayPhone').textContent = '+91 ' + phone;
    
    document.getElementById('phoneForm').style.display = 'none';
    document.getElementById('otpForm').style.display = 'block';
    
    startTimer();
}

// Edit number
function editNumber() {
    document.getElementById('phoneForm').style.display = 'block';
    document.getElementById('otpForm').style.display = 'none';
}

// Verify OTP
function verifyOTP(event) {
    event.preventDefault();
    const otpInputs = document.querySelectorAll('.otp-input');
    let otp = '';
    otpInputs.forEach(input => otp += input.value);
    
    if (otp.length === 6) {
        alert('OTP Verified! Welcome to Rentlee!');
        closeLoginModal();
    } else {
        alert('Please enter complete OTP');
    }
}

// Auto-move to next input
function moveToNext(current, nextIndex) {
    if (current.value.length === 1 && nextIndex < 6) {
        const inputs = document.querySelectorAll('.otp-input');
        inputs[nextIndex].focus();
    }
}

// Timer countdown
function startTimer() {
    let seconds = 25;
    const timerElement = document.getElementById('timer');
    
    const interval = setInterval(() => {
        seconds--;
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        timerElement.textContent = `0${mins}:${secs < 10 ? '0' : ''}${secs}`;
        
        if (seconds <= 0) {
            clearInterval(interval);
            timerElement.textContent = 'Resend OTP';
            timerElement.style.cursor = 'pointer';
        }
    }, 1000);
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('loginModal');
    if (event.target === modal) {
        closeLoginModal();
    }
}
</script>
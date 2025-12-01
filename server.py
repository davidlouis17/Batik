#!/usr/bin/env python3
"""
Custom HTTP Server untuk Website Batik Jawa Timur
Menghilangkan Broken Pipe Error dengan error handling yang lebih baik
"""

import http.server
import socketserver
import signal
import sys
import os

class QuietHTTPRequestHandler(http.server.SimpleHTTPRequestHandler):
    def log_message(self, format, *args):
        # Menghilangkan log HTTP request untuk mengurangi noise
        pass

    def handle_one_request(self):
        try:
            return super().handle_one_request()
        except (BrokenPipeError, ConnectionResetError):
            # Menangani Broken Pipe Error dengan tenang
            self.close_connection = True
            return

def signal_handler(sig, frame):
    print('\nServer dihentikan dengan aman.')
    sys.exit(0)

def main():
    # Setup signal handler untuk graceful shutdown
    signal.signal(signal.SIGINT, signal_handler)

    # Port yang akan digunakan
    PORT = 8002

    # Setup server
    with socketserver.TCPServer(("", PORT), QuietHTTPRequestHandler) as httpd:
        print(f"🌐 Server Batik Jawa Timur berjalan di port {PORT}")
        print(f"📱 Akses website di: http://localhost:{PORT}")
        print("❌ Tekan Ctrl+C untuk menghentikan server")

        try:
            httpd.serve_forever()
        except KeyboardInterrupt:
            print("\n👋 Server dimatikan.")

if __name__ == "__main__":
    main()
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#00A65D',
                    foreground: '#FFFFFF',
                    50: '#F0F9F4',
                    100: '#DCF2E4',
                    500: '#00A65D',
                    600: '#009952',
                    700: '#007A42'
                },
                background: '#FFFFFF',
                foreground: '#000000',
                muted: {
                    DEFAULT: '#F8F9FA',
                    foreground: '#6B7280'
                },
                accent: {
                    DEFAULT: '#F0F9F4',
                    foreground: '#00A65D'
                },
                card: {
                    DEFAULT: '#FFFFFF',
                    foreground: '#000000'
                },
                border: '#E5E7EB'
            },
            fontFamily: {
                'sans': ['Instrument Sans', 'system-ui', 'sans-serif'],
                'serif': ['Playfair Display', 'serif'],
                'body': ['Source Sans Pro', 'system-ui', 'sans-serif']
            }
        }
    }
}
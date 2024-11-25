/*

Tailwind - The Utility-First CSS Framework

A project by Adam Wathan (@adamwathan), Jonathan Reinink (@reinink),
David Hemphill (@davidhemphill) and Steve Schoger (@steveschoger).

Welcome to the Tailwind config file. This is where you can customize
Tailwind specifically for your project. Don't be intimidated by the
length of this file. It's really just a big JavaScript object and
we've done our very best to explain each section.

View the full documentation at https://tailwindcss.com.


|-------------------------------------------------------------------------------
| The default config
|-------------------------------------------------------------------------------
|
| This variable contains the default Tailwind config. You don't have
| to use it, but it can sometimes be helpful to have available. For
| example, you may choose to merge your custom configuration
| values with some of the Tailwind defaults.
|
*/

// let defaultConfig = require('tailwindcss/defaultConfig')()

/*
|-------------------------------------------------------------------------------
| Colors                                    https://tailwindcss.com/docs/colors
|-------------------------------------------------------------------------------
|
| Here you can specify the colors used in your project. To get you started,
| we've provided a generous palette of great looking colors that are perfect
| for prototyping, but don't hesitate to change them for your project. You
| own these colors, nothing will break if you change everything about them.
|
| We've used literal color names ("red", "blue", etc.) for the default
| palette, but if you'd rather use functional names like "primary" and
| "secondary", or even a numeric scale like "100" and "200", go for it.
|
*/

let colors = {
  'taste-1': '#4f4137',
  'taste-2': '#736357',
  'taste-3': '#a6988d',
  'taste-4': '#cebbad',
  'taste-5': '#e8e0da',
  'taste-6': '#9b9b9b',
  'taste-7': '#000000',
  'taste-8': '#f4f4f4',
  'taste-9': '#c8c8c8',
  light: '#ffffff',
  'transparent': 'transparent',
  // primary: 'var(--color-primary)',
  // secondary: 'var(--color-secondary)',
}

module.exports = {
  /*
  |-----------------------------------------------------------------------------
  | Colors                                  https://tailwindcss.com/docs/colors
  |-----------------------------------------------------------------------------
  |
  | The color palette defined above is also assigned to the "colors" key of
  | your Tailwind config. This makes it easy to access them in your CSS
  | using Tailwind's config helper. For example:
  |
  | .error { color: config('colors.red') }
  |
  */

  colors: colors,

  /*
  |-----------------------------------------------------------------------------
  | Screens                      https://tailwindcss.com/docs/responsive-design
  |-----------------------------------------------------------------------------
  |
  | Screens in Tailwind are translated to CSS media queries. They define the
  | responsive breakpoints for your project. By default Tailwind takes a
  | "mobile first" approach, where each screen size represents a minimum
  | viewport width. Feel free to have as few or as many screens as you
  | want, naming them in whatever way you'd prefer for your project.
  |
  | Tailwind also allows for more complex screen definitions, which can be
  | useful in certain situations. Be sure to see the full responsive
  | documentation for a complete list of options.
  |
  | Class name: .{screen}:{utility}
  |
  */

  screens: {
    xs: '375px',
    sm: '576px',
    md: '768px',
    lg: '992px',
    xl: '1200px',
    '2xl': '1400px',
  },

  /*
  |-----------------------------------------------------------------------------
  | Fonts                                    https://tailwindcss.com/docs/fonts
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your project's font stack, or font families.
  | Keep in mind that Tailwind doesn't actually load any fonts for you.
  | If you're using custom fonts you'll need to import them prior to
  | defining them here.
  |
  | By default we provide a native font stack that works remarkably well on
  | any device or OS you're using, since it just uses the default fonts
  | provided by the platform.
  |
  | Class name: .font-{name}
  |
  */

  fonts: {
    title: [
      'Abril Fatface',
      'Roboto Slab',
      'Constantia',
      'Lucida Bright',
      'Lucidabright',
      'Lucida Serif',
      'Lucida',
      'DejaVu Serif',
      'Bitstream Vera Serif',
      'Liberation Serif',
      'Georgia',
      'serif',
    ],
    subtitle: [
      'Heebo',
      'Montserrat',
      'system-ui',
      'BlinkMacSystemFont',
      '-apple-system',
      'Segoe UI',
      'Roboto',
      'Oxygen',
      'Ubuntu',
      'Cantarell',
      'Fira Sans',
      'Droid Sans',
      'Helvetica Neue',
      'sans-serif',
    ],
    body: [
      'Optima Roman',
      'Arial',
      'Helvetica',
      'Montserrat',
      'system-ui',
      'BlinkMacSystemFont',
      '-apple-system',
      'Segoe UI',
      'Roboto',
      'Oxygen',
      'Ubuntu',
      'Cantarell',
      'Fira Sans',
      'Droid Sans',
      'Helvetica Neue',
      'sans-serif',
    ],
    // mono: ['Menlo', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', 'monospace'],
  },

  /*
  |-----------------------------------------------------------------------------
  | Text sizes                         https://tailwindcss.com/docs/text-sizing
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your text sizes. Name these in whatever way
  | makes the most sense to you. We use size names by default, but
  | you're welcome to use a numeric scale or even something else
  | entirely.
  |
  | By default Tailwind uses the "rem" unit type for most measurements.
  | This allows you to set a root font size which all other sizes are
  | then based on. That said, you are free to use whatever units you
  | prefer, be it rems, ems, pixels or other.
  |
  | Class name: .text-{size}
  |
  */

  textSizes: {
    xs: '.63rem', // 10px
    sm: '.875rem', // 14px
    base: '1rem', // 16px
		lg: '1.125rem', // 18px
		'14pt': '14pt', // 14pt
    xl: '1.25rem', // 20px
    '2xl': '1.5rem', // 24px
    '3xl': '1.75rem', // 28px
    '4xl': '1.875rem', // 30px
    '5xl': '2.25rem', // 36px
    '6xl': '3rem', // 48px
    '7xl': '3.875rem', // 62px

    '75': '4.6875rem', // 75px
    '17': '1.0625rem', // 17px
    '14': '0.875rem', // 14px
    '16': '1rem', // 16px
    '26': '1.625rem', // 26px
    '0': '0rem', // 26px
    '18': '1.125rem', // 18px
    '11': '0.6875rem', // 11px
    '13': '0.8125rem', // 13px
    '22': '1.375rem', // 22px
    '50': '3.125rem', // 50px
    '42': '2.625rem', // 42px
    '64': '4rem', // 64px
    '66': '4.125rem', // 66px
    '30': '1.875rem', // 30px
    '58': '3.625rem', // 58px
    '12': '0.75rem', // 12px
    '24': '1.5rem', // 24px
    '20': '1.25rem', // 20px
    '60': '3.75rem', // 60px
    '48': '3rem', // 48px
    '36': '2.25rem', // 36px
    '40': '2.5rem', // 40px
    '73': '4.5625rem', // 73px
  },

  /*
  |-----------------------------------------------------------------------------
  | Font weights                       https://tailwindcss.com/docs/font-weight
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your font weights. We've provided a list of
  | common font weight names with their respective numeric scale values
  | to get you started. It's unlikely that your project will require
  | all of these, so we recommend removing those you don't need.
  |
  | Class name: .font-{weight}
  |
  */

  fontWeights: {
    light: 300,
    normal: 400,
    bold: 700,
  },

  /*
  |-----------------------------------------------------------------------------
  | Leading (line height)              https://tailwindcss.com/docs/line-height
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your line height values, or as we call
  | them in Tailwind, leadings.
  |
  | Class name: .leading-{size}
  |
  */

  leading: {
    0: 0,
    none: 1,
    tighter: 1.25,
    tight: 1.4,
    normal: 1.5,
    loose: 2,

    '101': 0.95, // 101px / 75px (101 is doesn't work, so use 71.25 instead)
    '20': 1.17, // 20px / 17px
    '17': 1.21, // 17px / 14px
    '19': 1.18, // 19px / 16px
    '24': 1.5, // 24px / 16px
    '38': 1.46, // 38px / 26px
    '21': 1.5, // 21px / 14px
    '13': 1.18, // 13px / 11px
    '15': 1.15, // 15px / 13px
    '32': 1.45, // 32px / 22px
    '67': 1.15, // 67px / 50px
    '57': 1.35, // 57px / 42px
    '89': 1.34, // 89px / 66px
    '40': 1.33, // 40px / 30px
    '78': 1.34, // 78px / 58px
    '36': 1.2, // 36px / 30px
    '18': 1.5, // 18px / 12px
    '28': 1.16, // 28px / 24px
    '12': 1.09, // 12px / 11px
    '69': 1.15, // 69px / 60px
    '30': 1.875, // 30px / 16px
    '30.18': 1.66, // 30px / 18px
    '17.12': 1.41, // 17px / 12px
    '30.12': 2.5, // 30px / 12px
    '30.11': 2.72727273, // 30px / 11px
    '52.48': 1.08, // 52px / 48px
    '14.12': 1.16, // 14px / 12px
    '49.36': 1.36, // 49px / 36px
    '30.16': 1.875, // 30px / 16px
    '15.69': 0.980625, // 15.69px / 16px
    '15.69/14': 1.12071429, // 15.69px / 14px
    '22': 1.375, // 22px / 16px
    '50/42': 1.19047619, // 50px / 42px
    '50/40': 1.25, // 50px / 40px
    '30.42': 0.71, // 30px / 42px
    '52.16': 3.25, // 52px / 16px
    '50.30': 1.66, // 50px / 30px
    '65': 1.3541666667,// 65px / 48px
  },

  /*
  |-----------------------------------------------------------------------------
  | Tracking (letter spacing)       https://tailwindcss.com/docs/letter-spacing
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your letter spacing values, or as we call
  | them in Tailwind, tracking.
  |
  | Class name: .tracking-{size}
  |
  */

  tracking: {
    tight: '-0.05em',
    normal: '0',
    wide: '0.05em',
    'x-wide': '0.1em',

    '4.13': '0.258em',
    '5.73': '0.358em',
    '3.71': '0.231em',
    '2.29': '0.143em',
    '2.54': '0.158em',
    '4.65': '0.29rem',
    '4.24': '0.265rem',
    '3': '0.1875rem',
    '4.5': '0.28125rem',
    '3.63': '0.226rem',
    '4': '0.25rem',
    '2.92': '0.1825rem',
    '4.77': '0.298125rem',
    '2.57': '0.160625rem',
    '3.18': '0.19875rem',
    '3.56': '0.2225rem',
    '4.63': '0.289375rem',
    '3.5': '0.21875rem',
    '4.05': '0.253125rem',
    '2.91': '0.181875rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Text colors                         https://tailwindcss.com/docs/text-color
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your text colors. By default these use the
  | color palette we defined above, however you're welcome to set these
  | independently if that makes sense for your project.
  |
  | Class name: .text-{color}
  |
  */

  textColors: colors,

  /*
  |-----------------------------------------------------------------------------
  | Background colors             https://tailwindcss.com/docs/background-color
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your background colors. By default these use
  | the color palette we defined above, however you're welcome to set
  | these independently if that makes sense for your project.
  |
  | Class name: .bg-{color}
  |
  */

  backgroundColors: colors,

  /*
  |-----------------------------------------------------------------------------
  | Background sizes               https://tailwindcss.com/docs/background-size
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your background sizes. We provide some common
  | values that are useful in most projects, but feel free to add other sizes
  | that are specific to your project here as well.
  |
  | Class name: .bg-{size}
  |
  */

  backgroundSize: {
    auto: 'auto',
    cover: 'cover',
    contain: 'contain',
  },

  /*
  |-----------------------------------------------------------------------------
  | Border widths                     https://tailwindcss.com/docs/border-width
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your border widths. Take note that border
  | widths require a special "default" value set as well. This is the
  | width that will be used when you do not specify a border width.
  |
  | Class name: .border{-side?}{-width?}
  |
  */

  borderWidths: {
    default: '1px',
    '0': '0',
    '2': '2px',
    '3': '3px',
    '4': '4px',
    '8': '8px',
    '20': '20px',
  },

  /*
  |-----------------------------------------------------------------------------
  | Border colors                     https://tailwindcss.com/docs/border-color
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your border colors. By default these use the
  | color palette we defined above, however you're welcome to set these
  | independently if that makes sense for your project.
  |
  | Take note that border colors require a special "default" value set
  | as well. This is the color that will be used when you do not
  | specify a border color.
  |
  | Class name: .border-{color}
  |
  */

  borderColors: global.Object.assign({
    default: colors['grey-secondary'],
    trans: 'rgba(255, 255, 255, 0.4)',
    'blur-taste-6': 'rgba(155, 155, 155, 0.5)',
  }, colors),

  /*
  |-----------------------------------------------------------------------------
  | Border radius                    https://tailwindcss.com/docs/border-radius
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your border radius values. If a `default` radius
  | is provided, it will be made available as the non-suffixed `.rounded`
  | utility.
  |
  | If your scale includes a `0` value to reset already rounded corners, it's
  | a good idea to put it first so other values are able to override it.
  |
  | Class name: .rounded{-side?}{-size?}
  |
  */

  borderRadius: {
    none: '0',
    default: '.5rem',
    full: '9999px',
  },

  /*
  |-----------------------------------------------------------------------------
  | Width                                    https://tailwindcss.com/docs/width
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your width utility sizes. These can be
  | percentage based, pixels, rems, or any other units. By default
  | we provide a sensible rem based numeric scale, a percentage
  | based fraction scale, plus some other common use-cases. You
  | can, of course, modify these values as needed.
  |
  |
  | It's also worth mentioning that Tailwind automatically escapes
  | invalid CSS class name characters, which allows you to have
  | awesome classes like .w-2/3.
  |
  | Class name: .w-{size}
  |
  */

  width: {
    auto: 'auto',
    px: '1px',
    '1': '0.25rem',
    // '2': '0.5rem',
    '3': '0.75rem',
    '4': '1rem',
    '5': '1.25rem',
    '6': '1.5rem',
    '8': '2rem',
    '10': '2.5rem',
    '12': '3rem',
    '16': '4rem',
    '24': '6rem',
    '32': '8rem',
    '48': '12rem',
    '64': '16rem',
    '128': '32rem',
    '1/2': '50%',
    '1/3': '33.33333%',
    '2/3': '66.66667%',
    '1/4': '25%',
    '3/4': '75%',
    '1/5': '20%',
    '2/5': '40%',
    '3/5': '60%',
    '4/5': '80%',
    '1/6': '16.66667%',
    '5/6': '83.33333%',
    full: '100%',
    screen: '100vw',

    '576': '36rem',
    '40': '2.5rem',
    '128': '8rem',
    '132': '8.25rem',
    '31': '1.93rem',
    '2': '0.125rem',
    '37': '2.3125rem',
    '46': '2.875rem',
    '33': '2.0625rem',
    '265': '16.5625rem',
    '34': '2.125rem',
    '47': '2.9375rem',
    '20': '1.25rem',
    '30': '1.875rem',
    '151': '9.4375rem',
    '25': '1.5625rem',
    '28': '1.75rem',
    '50': '3.125rem',
    '30%': '30%',
    '34%': '34%',
    '66%': '66%',
    'half': '50%',
    '70': '4.375rem',
    '38': '2.375rem',
    'featured-instagram': 'calc(470 / 1440 * 100vw)',
    'appreciation': 'calc(561 / 1440 * 100vw)',
    '9/12': 'calc(9 / 12 * 100%)',
    '99': '6.1875rem',
    '75': '4.6875rem',
    '276': '17.25rem',
    '126': '7.875rem',
    'team-avatar': '38.4375rem',
    '90': '5.625rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Height                                  https://tailwindcss.com/docs/height
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your height utility sizes. These can be
  | percentage based, pixels, rems, or any other units. By default
  | we provide a sensible rem based numeric scale plus some other
  | common use-cases. You can, of course, modify these values as
  | needed.
  |
  | Class name: .h-{size}
  |
  */

  height: {
    auto: 'auto',
    px: '1px',
    '1': '0.25rem',
    // '2': '0.5rem',
    '3': '0.75rem',
    // '4': '1rem',
    '5': '1.25rem',
    '6': '1.5rem',
    '8': '2rem',
    '10': '2.5rem',
    '12': '3rem',
    // '16': '4rem',
    '24': '6rem',
    '32': '8rem',
    '48': '12rem',
    '64': '16rem',
    full: '100%',
    screen: '100vh',

    '40': '2.5rem',
    '36': '2.25rem',
    '3.78': '0.23625rem',
    '17': '1.0625rem',
    '33': '2.0625rem',
    '34': '2.125rem',
    '20': '1.25rem',
    '4.44': '0.2775rem',
    '4': '0.25rem',
    '41': '2.5625rem',
    '2': '0.125rem',
    '3': '0.1875rem',
    '25': '1.5625rem',
    '28': '1.75rem',
    '16': '1rem',
    '44': '2.75rem',
    '47': '2.9375rem',
    '90': '5.625rem',
    '74': '4.625rem',
    '50': '3.125rem',
    'featured': 'calc(628 / 1440 * 100vw)',
    'featured-mobile': 'calc(240 / 414 * 100vw)',
    'featured-blog': 'calc(230 / 1440 * 100vw)',
    'featured-blog-mobile': 'calc(148 / 414 * 100vw)',
    'featured-instagram': 'calc(470 / 1440 * 100vw)',
    'featured-instagram-mobile': 'calc(335 / 414 * 100vw)',
    'appreciation-mobile': 'calc(329 / 414 * 100vw)',
    'blog-image': 'calc(720 / 1440 * 100vw)',
    'related-image': 'calc(190 / 1440 * 100vw)',
    'alt-blog-image': 'calc(500 / 1440 * 100vw)',
    'gallery-image': 'calc(485 / 1440 * 100vw)',
    'gallery-image-post-content': 'calc(336 / 1440 * 100vw)',
    'gallery-image-mobile': 'calc(275 / 414 * 100vw)',
    'gallery-image-post-content-mobile': 'calc(248 / 414 * 100vw)',
    'm90': 'calc(100% - 136px)',
    'project-block': 'calc(452 / 414 * 100vw)',
    'video-block': 'calc(732 / 1440 * 100vw)',
    '276': '17.25rem',
    '143': '8.9375rem',
    'team-image': 'calc(500 / 1440 * 100vw)',
    'team-image-mobile': 'calc(300 / 414 * 100vw)',
    'team-avatar': '44.5rem',
    'artist-image': 'calc(420 / 1440 * 100vw)',
    '65': '4.0625rem',
    '30': '1.875rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Minimum width                        https://tailwindcss.com/docs/min-width
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your minimum width utility sizes. These can
  | be percentage based, pixels, rems, or any other units. We provide a
  | couple common use-cases by default. You can, of course, modify
  | these values as needed.
  |
  | Class name: .min-w-{size}
  |
  */

  minWidth: {
    '0': '0',
    full: '100%',
    '316': '19.75rem',
    '158': '9.875rem',
    '99': '6.1875rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Minimum height                      https://tailwindcss.com/docs/min-height
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your minimum height utility sizes. These can
  | be percentage based, pixels, rems, or any other units. We provide a
  | few common use-cases by default. You can, of course, modify these
  | values as needed.
  |
  | Class name: .min-h-{size}
  |
  */

  minHeight: {
    '0': '0',
    full: '100%',
    screen: '100vh',
    '87': '5.4375rem',
    'artist-avatar': 'calc(800 / 1440 * 100vw)',
    'artist-avatar-mobile': 'calc(600 / 414 * 100vw)',
  },

  /*
  |-----------------------------------------------------------------------------
  | Maximum width                        https://tailwindcss.com/docs/max-width
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your maximum width utility sizes. These can
  | be percentage based, pixels, rems, or any other units. By default
  | we provide a sensible rem based scale and a "full width" size,
  | which is basically a reset utility. You can, of course,
  | modify these values as needed.
  |
  | Class name: .max-w-{size}
  |
  */

  maxWidth: {
    xs: '20rem',
    sm: '25rem',
    md: '40rem',
    lg: '50rem',
    xl: '60rem',
    '2xl': '70rem',
    '3xl': '80rem',
    '4xl': '90rem',
    '5xl': '100rem',
    full: '100%',
    '1000': '62.5rem',
    'initial': 'initial',
    '498': '31.125rem',
    '1200': '75rem',
    '920': '57.5rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Maximum height                      https://tailwindcss.com/docs/max-height
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your maximum height utility sizes. These can
  | be percentage based, pixels, rems, or any other units. We provide a
  | couple common use-cases by default. You can, of course, modify
  | these values as needed.
  |
  | Class name: .max-h-{size}
  |
  */

  maxHeight: {
    full: '100%',
    screen: '100vh',
  },

  /*
  |-----------------------------------------------------------------------------
  | Padding                                https://tailwindcss.com/docs/padding
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your padding utility sizes. These can be
  | percentage based, pixels, rems, or any other units. By default we
  | provide a sensible rem based numeric scale plus a couple other
  | common use-cases like "1px". You can, of course, modify these
  | values as needed.
  |
  | Class name: .p{side?}-{size}
  |
  */

  padding: {
    // px: '1px',
    '0': '0',
    // '1': '0.25rem',
    // '2': '0.5rem',
    // '3': '0.75rem',
    '4': '1rem',
    // '5': '1.25rem',
    // '6': '1.5rem',
    // '8': '2rem',
    // '10': '2.5rem',
    '12': '3rem',
    '16': '4rem',
    // '20': '5rem',
    // '24': '6rem',
    '32': '8rem',

    '34': '2.125rem',
    '27': '1.6875rem',
    '55': '3.49rem',
    '40': '2.5rem',
    '50': '3.125rem',
    '24': '1.5rem',
    '30': '1.875rem',
    '16': '1rem',
    '8': '0.5rem',
    '10': '0.625rem',
    '20': '1.25rem',
    '15': '0.9375rem',
    '19': '1.1875rem',
    '85': '5.33rem',
    '25': '1.5625rem',
    '21': '1.3125rem',
    '5': '0.3125rem',
    '70': '4.375rem',
    '60': '3.75rem',
    '65': '4.0625rem',
    '75': '4.6875rem',
    '36': '2.25rem',
    '80': '5rem',
    '100': '6.25rem',
    '3': '0.1875rem',
    '140': '8.75rem',
    '46': '2.875rem',
    '145': '9.0625rem',
    '175': '10.9375rem',
    '35': '2.1875rem',
    '45': '2.8125rem',
    '2': '0.125rem',
    '6': '0.375rem',
    '150': '9.375rem',
    '130': '8.125rem',
    '1': '1px',
    '72': '4.5rem',
    '116': '7.25rem',
    '42': '2.625rem',
    '76': '4.75rem',
    '63': '3.9375rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Margin                                  https://tailwindcss.com/docs/margin
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your margin utility sizes. These can be
  | percentage based, pixels, rems, or any other units. By default we
  | provide a sensible rem based numeric scale plus a couple other
  | common use-cases like "1px". You can, of course, modify these
  | values as needed.
  |
  | Class name: .m{side?}-{size}
  |
  */

  margin: {
    auto: 'auto',
    // px: '1px',
    '0': '0',
    // '1': '0.25rem',
    '2': '0.5rem',
    // '3': '0.75rem',
    '4': '1rem',
    // '5': '1.25rem',
    '6': '1.5rem',
    '8': '2rem',
    // '10': '2.5rem',
    '12': '3rem',
    // '16': '4rem',
    // '20': '5rem',
    // '24': '6rem',
    '32': '8rem',

    '30': '1.875rem',
    '28': '1.75rem',
    '22': '1.375rem',
    '85': '5.3125rem',
    '40': '2.5rem',
    '10': '0.625rem',
    '5': '0.3125rem',
    '20': '1.25rem',
    '11': '0.6875rem',
    '45': '2.8125rem',
    '70': '4.375rem',
    '50': '3.125rem',
    '32': '2rem',
    '60': '3.75rem',
    '25': '1.5625rem',
    '16': '1rem',
    '75': '4.6875rem',
    '24': '1.5rem',
    '12': '0.75rem',
    '80': '5rem',
    '90': '5.62500rem',
    '15': '0.9375rem',
    '35': '2.1875rem',
    'n5': '-0.3125rem',
    'n2': '-0.125rem',
    '18': '1.125rem',
    'n21': '-1.3125rem',
    '120': '7.5rem',
    '140': '8.75rem',
    '116': '7.25rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Negative margin                https://tailwindcss.com/docs/negative-margin
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your negative margin utility sizes. These can
  | be percentage based, pixels, rems, or any other units. By default we
  | provide matching values to the padding scale since these utilities
  | generally get used together. You can, of course, modify these
  | values as needed.
  |
  | Class name: .-m{side?}-{size}
  |
  */

  negativeMargin: {
    px: '1px',
    '0': '0',
    '1': '0.25rem',
    '2': '0.5rem',
    '3': '0.75rem',
    '4': '1rem',
    '5': '1.25rem',
    '6': '1.5rem',
    '8': '2rem',
    '10': '2.5rem',
    '12': '3rem',
    '16': '4rem',
    '20': '5rem',
    '24': '6rem',
    '32': '8rem',
  },

  /*
  |-----------------------------------------------------------------------------
  | Shadows                                https://tailwindcss.com/docs/shadows
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your shadow utilities. As you can see from
  | the defaults we provide, it's possible to apply multiple shadows
  | per utility using comma separation.
  |
  | If a `default` shadow is provided, it will be made available as the non-
  | suffixed `.shadow` utility.
  |
  | Class name: .shadow-{size?}
  |
  */

  shadows: {
    default: '0 2px 4px 0 rgba(0,0,0,0.10)',
    md: '0 4px 8px 0 rgba(0,0,0,0.12), 0 2px 4px 0 rgba(0,0,0,0.08)',
    lg: '0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08)',
    inner: 'inset 0 2px 4px 0 rgba(0,0,0,0.06)',
    outline: '0 0 0 3px rgba(52,144,220,0.5)',
    none: 'none',
  },

  /*
  |-----------------------------------------------------------------------------
  | Z-index                                https://tailwindcss.com/docs/z-index
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your z-index utility values. By default we
  | provide a sensible numeric scale. You can, of course, modify these
  | values as needed.
  |
  | Class name: .z-{index}
  |
  */

  zIndex: {
    auto: 'auto',
    '0': 0,
    '10': 10,
    '20': 20,
    '30': 30,
    '40': 40,
    '50': 50,
  },

  /*
  |-----------------------------------------------------------------------------
  | Opacity                                https://tailwindcss.com/docs/opacity
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your opacity utility values. By default we
  | provide a sensible numeric scale. You can, of course, modify these
  | values as needed.
  |
  | Class name: .opacity-{name}
  |
  */

  opacity: {
    '0': '0',
    '25': '.25',
    '50': '.5',
    '75': '.75',
    '100': '1',

    '80': '.8',
    '60': '.6',
  },

  /*
  |-----------------------------------------------------------------------------
  | SVG fill                                   https://tailwindcss.com/docs/svg
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your SVG fill colors. By default we just provide
  | `fill-current` which sets the fill to the current text color. This lets you
  | specify a fill color using existing text color utilities and helps keep the
  | generated CSS file size down.
  |
  | Class name: .fill-{name}
  |
  */

  svgFill: colors,

  /*
  |-----------------------------------------------------------------------------
  | SVG stroke                                 https://tailwindcss.com/docs/svg
  |-----------------------------------------------------------------------------
  |
  | Here is where you define your SVG stroke colors. By default we just provide
  | `stroke-current` which sets the stroke to the current text color. This lets
  | you specify a stroke color using existing text color utilities and helps
  | keep the generated CSS file size down.
  |
  | Class name: .stroke-{name}
  |
  */

  svgStroke: {
    current: 'currentColor',
  },

  /*
  |-----------------------------------------------------------------------------
  | Modules                  https://tailwindcss.com/docs/configuration#modules
  |-----------------------------------------------------------------------------
  |
  | Here is where you control which modules are generated and what variants are
  | generated for each of those modules.
  |
  | Currently supported variants:
  |   - responsive
  |   - hover
  |   - focus
  |   - active
  |   - group-hover
  |
  | To disable a module completely, use `false` instead of an array.
  |
  */

  modules: {
    appearance: ['responsive'],
    backgroundAttachment: ['responsive'],
    backgroundColors: ['responsive', 'hover'],
    backgroundPosition: ['responsive'],
    backgroundRepeat: ['responsive'],
    backgroundSize: ['responsive'],
    borderCollapse: false,
    borderColors: [],
    borderRadius: ['responsive'],
    borderStyle: ['responsive'],
    borderWidths: ['responsive'],
    cursor: ['responsive'],
    display: ['responsive'],
    flexbox: ['responsive'],
    float: ['responsive'],
    fonts: ['responsive'],
    fontWeights: ['responsive', 'hover'],
    height: ['responsive'],
    leading: ['responsive'],
    lists: ['responsive'],
    margin: ['responsive'],
    maxHeight: ['responsive'],
    maxWidth: ['responsive'],
    minHeight: ['responsive'],
    minWidth: ['responsive'],
    negativeMargin: [],
    opacity: ['responsive'],
    outline: ['focus'],
    overflow: ['responsive'],
    padding: ['responsive'],
    pointerEvents: ['responsive'],
    position: ['responsive'],
    resize: ['responsive'],
    shadows: ['hover'],
    svgFill: [],
    svgStroke: [],
    tableLayout: false,
    textAlign: ['responsive'],
    textColors: ['responsive', 'hover'],
    textSizes: ['responsive'],
    textStyle: ['responsive', 'hover'],
    tracking: ['responsive'],
    userSelect: ['responsive'],
    verticalAlign: ['responsive'],
    visibility: ['responsive'],
    whitespace: ['responsive'],
    width: ['responsive'],
    zIndex: [],
  },

  /*
  |-----------------------------------------------------------------------------
  | Plugins                                https://tailwindcss.com/docs/plugins
  |-----------------------------------------------------------------------------
  |
  | Here is where you can register any plugins you'd like to use in your
  | project. Tailwind's built-in `container` plugin is enabled by default to
  | give you a Bootstrap-style responsive container component out of the box.
  |
  | Be sure to view the complete plugin documentation to learn more about how
  | the plugin system works.
  |
  */

  plugins: [
    require('tailwindcss/plugins/container')({
      center: true,
      // padding: '1rem',
    }),
  ],

  /*
  |-----------------------------------------------------------------------------
  | Advanced Options         https://tailwindcss.com/docs/configuration#options
  |-----------------------------------------------------------------------------
  |
  | Here is where you can tweak advanced configuration options. We recommend
  | leaving these options alone unless you absolutely need to change them.
  |
  */

  options: {
    prefix: '',
    important: false,
    separator: ':',
  },
}

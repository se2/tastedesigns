<?php
/**
 * Theme Colors implementation
 *
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

const PRIMARY = '#4F4137';
const SECONDARY = '#E8E0DA';
const LARGE = '1024px';

$primary = get_field('theme_primaryColor', 'options');
$secondary = get_field('theme_secondaryColor', 'options');

if (empty($primary)) {
  $primary = PRIMARY;
}

if (empty($secondary)) {
  $secondary = SECONDARY;
}
?>

<style id="color-scheme" type="text/css">
  .tc-primary,
  .tc-primary-hover:hover,
  .tc-primary-before::before,
  .tc-primary-after::after,
  .tc-primary-hover-before:hover::before,
  .tc-primary-hover-after:hover::after {
    color: <?php echo $primary; ?>;
  }

  .bgc-primary,
  .bgc-primary-hover:hover,
  .bgc-primary-before::before,
  .bgc-primary-after::after,
  .bgc-primary-hover-before:hover::before,
  .bgc-primary-hover-after:hover::after {
    background-color: <?php echo $primary; ?>;
  }

  .bc-primary,
  .bc-primary-hover:hover,
  .bc-primary-before::before,
  .bc-primary-after::after,
  .bc-primary-hover-before:hover::before,
  .bc-primary-hover-after:hover::after {
    border-color: <?php echo $primary; ?>;
  }

  .tc-secondary,
  .tc-secondary-hover:hover,
  .tc-secondary-before::before,
  .tc-secondary-after::after,
  .tc-secondary-hover-before:hover::before,
  .tc-secondary-hover-after:hover::after {
    color: <?php echo $secondary; ?>;
  }

  .bgc-secondary,
  .bgc-secondary-hover:hover,
  .bgc-secondary-before::before,
  .bgc-secondary-after::after,
  .bgc-secondary-hover-before:hover::before,
  .bgc-secondary-hover-after:hover::after {
    background-color: <?php echo $secondary; ?>;
  }

  .bc-secondary,
  .bc-secondary-hover:hover,
  .bc-secondary-before::before,
  .bc-secondary-after::after,
  .bc-secondary-hover-before:hover::before,
  .bc-secondary-hover-after:hover::after {
    border-color: <?php echo $secondary; ?>;
  }

  @media (min-width: <?php echo LARGE; ?>) {
    .tc-large-primary,
    .tc-large-primary-hover:hover {
      color: <?php echo $primary; ?>;
    }

    .bgc-large-primary,
    .bgc-large-primary-hover:hover {
      background-color: <?php echo $primary; ?>;
    }

    .bc-large-primary,
    .bc-large-primary-hover:hover {
      border-color: <?php echo $primary; ?>;
    }

    .tc-large-secondary,
    .tc-large-secondary-hover:hover {
      color: <?php echo $secondary; ?>;
    }

    .bgc-large-secondary,
    .bgc-large-secondary-hover:hover {
      background-color: <?php echo $secondary; ?>;
    }

    .bc-large-secondary,
    .bc-large-secondary-hover:hover {
      border-color: <?php echo $secondary; ?>;
    }
  }
</style>

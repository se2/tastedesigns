<?php
/**
 * Taste Colors Management
 */

class TasteColors {
	const PRIMARY = 'primary';
	const SECONDARY = 'secondary';
	const TERTIARY = 'tertiary';
	const COLOR = 1;
	const BACKGROUND = 2;
	const BORDER = 3;
	const FILL = 4;

	private $colors;
	private $override;
	private $option;
	private $id;

	public function __construct($option = false, $id = false) {
		$this->colors = array();
		$this->override = false;
		$this->option = $option;
		$this->id = $id;
		$this->collectThemeColors();
	}

	private function collectThemeColors() {
		while ($this->haveRowColors()) {
			the_row();
			$this->override = get_sub_field('override_default_colors');
			if ($this->override) {
				$keys = array(self::PRIMARY, self::SECONDARY, self::TERTIARY);
				foreach ($keys as $key) {
					$color = get_sub_field($key.'_color');
					$color_alternative = get_sub_field($key.'_color_alternative');
					if (!empty($color) && $color != 'other') {
						$this->colors[$key] = $color;
					} else if (!empty($color_alternative)) {
						$this->colors[$key] = $color_alternative;
					}
				}
			}
		}
	}

	private function haveRowColors() {
		if ($this->option) {
			return have_rows('colors', 'option');
		} else if ($this->id) {
			return have_rows('colors', $this->id);
		} else {
			return have_rows('colors');
		}
	}

	private function generateProperty($property, $color) {
		switch ($property) {
			case self::COLOR:
				return 'color:'.$color.';';
			case self::BORDER:
				return 'border-color:'.$color.';';
			case self::BACKGROUND:
				return 'background-color:'.$color.';';
			case self::FILL:
				return 'fill:'.$color.';';
		}
	}

	private function generateStyle($type, $color) {
		$style = 'style="';
		if (is_array($type)) {
			foreach ($type as $property) {
				$style .= $this->generateProperty($property, $color);
			}
		} else {
			$style .= $this->generateProperty($type, $color);
		}
		$style .= '"';
		return $style;
	}

	public function getPrimary($type = self::COLOR, $echo = true) {
		if ($this->override) {
			$style = $this->generateStyle($type, $this->getRawPrimary());
			if ($echo) {
				echo $style;
			} else {
				return $style;
			}
		}
	}

	public function getSecondary($type = self::COLOR, $echo = true) {
		if ($this->override) {
			$style = $this->generateStyle($type, $this->getRawSecondary());
			if ($echo) {
				echo $style;
			} else {
				return $style;
			}
		}
	}

	public function getTertiary($type = self::COLOR, $echo = true) {
		if ($this->override) {
			$style = $this->generateStyle($type, $this->getRawTertiary());
			if ($echo) {
				echo $style;
			} else {
				return $style;
			}
		}
	}

	public function getPrimaryColor($echo = true) {
		return $this->getPrimary(self::COLOR, $echo);
	}

	public function getPrimaryBackground($echo = true) {
		return $this->getPrimary(self::BACKGROUND, $echo);
	}

	public function getPrimaryBorder($echo = true) {
		return $this->getPrimary(self::BORDER, $echo);
	}

	public function getPrimaryFill($echo = true) {
		return $this->getPrimary(self::FILL, $echo);
	}

	public function getSecondaryColor($echo = true) {
		return $this->getSecondary(self::COLOR, $echo);
	}

	public function getSecondaryBackground($echo = true) {
		return $this->getSecondary(self::BACKGROUND, $echo);
	}

	public function getSecondaryBorder($echo = true) {
		return $this->getSecondary(self::BORDER, $echo);
	}

	public function getSecondaryFill($echo = true) {
		return $this->getSecondary(self::FILL, $echo);
	}

	public function getTertiaryColor($echo = true) {
		return $this->getTertiary(self::COLOR, $echo);
	}

	public function getTertiaryBackground($echo = true) {
		return $this->getTertiary(self::BACKGROUND, $echo);
	}

	public function getTertiaryBorder($echo = true) {
		return $this->getTertiary(self::BORDER, $echo);
	}

	public function getTertiaryFill($echo = true) {
		return $this->getTertiary(self::FILL, $echo);
	}

	public function isOverriden() {
		return $this->override;
	}

	public function getRawPrimary() {
		if ($this->override) {
			return $this->colors[self::PRIMARY];
		}
	}

	public function getRawSecondary() {
		if ($this->override) {
			return $this->colors[self::SECONDARY];
		}
	}

	public function getRawTertiary() {
		if ($this->override) {
			return $this->colors[self::TERTIARY];
		}
	}
}

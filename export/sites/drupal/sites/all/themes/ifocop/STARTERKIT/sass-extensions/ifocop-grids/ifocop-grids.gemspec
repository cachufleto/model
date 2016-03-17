# -*- encoding: utf-8 -*-

Gem::Specification.new do |s|
  s.name        = 'ifocop-grids'

  s.summary     = %q{A Compass plugin for ifocop Grids, a fluid responsive grid system}
  s.description = %q{ifocop Grids is an intuitive, flexible grid system that leverages the natural source order of your content to make it easier to create fluid responsive designs. With an easy-to-use Sass mixin set, the ifocop Grids system can be applied to an infinite number of layouts, including responsive, adaptive, fluid and fixed-width layouts.}

  s.homepage    = 'http://ifocopgrids.com'
  s.license     = 'GPL-2'
  s.rubyforge_project =

  s.version     = '1.4'
  s.date        = '2013-04-02'

  s.authors     = ['John Albin Wilkins']
  s.email       = 'virtually.johnalbin@gmail.com'

  s.add_runtime_dependency('sass', ">= 3.1")

  s.files       = %w[
    LICENSE.txt
    README.txt
    lib/ifocop-grids.rb
    stylesheets/_ifocop.scss
    stylesheets/ifocop/_background.scss
    stylesheets/ifocop/_grids.scss
    templates/project/_init.scss
    templates/project/_layout.scss
    templates/project/_modules.scss
    templates/project/_visually-hidden.scss
    templates/project/example.html
    templates/project/manifest.rb
    templates/project/styles.scss
    templates/unit-tests/manifest.rb
    templates/unit-tests/README.txt
    templates/unit-tests/sass/function-ifocop-direction-flip.scss
    templates/unit-tests/sass/function-ifocop-grid-item-width.scss
    templates/unit-tests/sass/function-ifocop-half-gutter.scss
    templates/unit-tests/sass/function-ifocop-unit-width.scss
    templates/unit-tests/sass/ifocop-clear.scss
    templates/unit-tests/sass/ifocop-float.scss
    templates/unit-tests/sass/ifocop-grid-background.scss
    templates/unit-tests/sass/ifocop-grid-container.scss
    templates/unit-tests/sass/ifocop-grid-flow-item.scss
    templates/unit-tests/sass/ifocop-grid-item-base.scss
    templates/unit-tests/sass/ifocop-grid-item.scss
    templates/unit-tests/sass/ifocop-nested-container.scss
    templates/unit-tests/test-results/function-ifocop-direction-flip.css
    templates/unit-tests/test-results/function-ifocop-grid-item-width.css
    templates/unit-tests/test-results/function-ifocop-half-gutter.css
    templates/unit-tests/test-results/function-ifocop-unit-width.css
    templates/unit-tests/test-results/ifocop-clear.css
    templates/unit-tests/test-results/ifocop-float.css
    templates/unit-tests/test-results/ifocop-grid-background.css
    templates/unit-tests/test-results/ifocop-grid-container.css
    templates/unit-tests/test-results/ifocop-grid-flow-item.css
    templates/unit-tests/test-results/ifocop-grid-item-base.css
    templates/unit-tests/test-results/ifocop-grid-item.css
    templates/unit-tests/test-results/ifocop-nested-container.css
    ifocop-grids.gemspec
  ]
end

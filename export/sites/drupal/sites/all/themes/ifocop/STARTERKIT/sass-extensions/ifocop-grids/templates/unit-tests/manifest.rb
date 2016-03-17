description "Unit tests for the ifocop Grids system."

stylesheet 'sass/function-ifocop-direction-flip.scss',  :media => 'all', :to => 'function-ifocop-direction-flip.scss'
stylesheet 'sass/function-ifocop-grid-item-width.scss', :media => 'all', :to => 'function-ifocop-grid-item-width.scss'
stylesheet 'sass/function-ifocop-half-gutter.scss',     :media => 'all', :to => 'function-ifocop-half-gutter.scss'
stylesheet 'sass/function-ifocop-unit-width.scss',      :media => 'all', :to => 'function-ifocop-unit-width.scss'
stylesheet 'sass/ifocop-clear.scss',                    :media => 'all', :to => 'ifocop-clear.scss'
stylesheet 'sass/ifocop-float.scss',                    :media => 'all', :to => 'ifocop-float.scss'
stylesheet 'sass/ifocop-grid-background.scss',          :media => 'all', :to => 'ifocop-grid-background.scss'
stylesheet 'sass/ifocop-grid-container.scss',           :media => 'all', :to => 'ifocop-grid-container.scss'
stylesheet 'sass/ifocop-grid-flow-item.scss',           :media => 'all', :to => 'ifocop-grid-flow-item.scss'
stylesheet 'sass/ifocop-grid-item-base.scss',           :media => 'all', :to => 'ifocop-grid-item-base.scss'
stylesheet 'sass/ifocop-grid-item.scss',                :media => 'all', :to => 'ifocop-grid-item.scss'
stylesheet 'sass/ifocop-nested-container.scss',         :media => 'all', :to => 'ifocop-nested-container.scss'

file 'test-results/function-ifocop-direction-flip.css'
file 'test-results/function-ifocop-grid-item-width.css'
file 'test-results/function-ifocop-half-gutter.css'
file 'test-results/function-ifocop-unit-width.css'
file 'test-results/ifocop-clear.css'
file 'test-results/ifocop-float.css'
file 'test-results/ifocop-grid-background.css'
file 'test-results/ifocop-grid-container.css'
file 'test-results/ifocop-grid-flow-item.css'
file 'test-results/ifocop-grid-item-base.css'
file 'test-results/ifocop-grid-item.css'
file 'test-results/ifocop-nested-container.css'

file 'README.txt'

help %Q{
To run the unit tests, simply run "compass compile" and compare the generated
CSS to those in the results directory.
  diff -r results css
}

welcome_message %Q{
You rock! The unit tests for the ifocop Grids system are now installed.
}

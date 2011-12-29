class Country < ActiveRecord::Base
	has_many :institutions

        def to_param
          "#{id}_#{name.parameterize}"
        end

protected
        def self.paginate_countries(page)
                paginate :per_page => 15, :page => page,
                         :order => 'updated_at DESC'
        end

end

class Institution < ActiveRecord::Base
	belongs_to :country
	has_many :tutors

        def to_param
          "#{id}_#{name.parameterize}"
        end

protected
        def self.paginate_institutions(page)
                paginate :per_page => 15, :page => page,
                         :order => 'updated_at DESC'
        end

end

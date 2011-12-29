class Course < ActiveRecord::Base
	has_many :ratings
	has_many :tutors, :through => :ratings
	
	validates_presence_of :name
	# validates_uniqueness_of :name

	def code_name
		"[#{self.code}] #{self.name}"
	end

        def to_param
          "#{id}_#{name.parameterize}"
        end

protected
        def self.paginate_courses(page)
                paginate :per_page => 15, :page => page,
                         :order => 'updated_at DESC',
                         :conditions => "enabled = 't'"
        end

end
